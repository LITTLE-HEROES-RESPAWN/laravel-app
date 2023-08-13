<?php
namespace App\Services;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\LazyCollection;

class CsvService implements FilesystemInterface
{
    /**
     * ファイルに書き込む
     *
     * @param mixed $data 書き込み内容
     * @param mixed $header ヘッダー
     * @return void
     */
    public function write(mixed $data, $header)
    {
        $stream = $this->open();

        $this->filterStream($stream);

        if (!is_null($header)) {
            $header = $this->toArray($header);
            $this->writeRow($stream, $header);
        }

        foreach ($this->toTraversable($data) as $row) {
            $this->writeRow($stream, $this->toArray($row, $header));
        }

        $this->close($stream);
    }

    /**
     * ストリームを開く
     *
     * @param string $filename
     * @param string $mode
     * @return resource
     */
    public function open(string $filename = 'php://output', string $mode = 'w')
    {
        // 出力バッファをopen（できなければエラー）
        return throw_unless(
            fopen($filename, $mode),
            \Exception::class,
            'ストリームを開くことができませんでした。'
        );
    }

    /**
     * ストリームを閉じる
     *
     * @param resource $stream
     * @return void
     */
    public function close($stream)
    {
        fclose($stream);
    }

    /**
     * ストリームにフィルター付加
     *
     * @param resource $stream ストリーム
     * @param string $filtername フィルタ名
     * @return void
     */
    public function filterStream($stream, string $filtername = 'convert.iconv.utf-8/cp932//TRANSLIT')
    {
        // 文字コードを変換して、文字化け回避
        stream_filter_prepend($stream, $filtername);
    }

    /**
     * データ書き込み（行）
     *
     * @param mixed $stream ストリーム
     * @param mixed $data 書き込むデータ
     * @return void
     */
    public function writeRow($stream, mixed $data)
    {
        // データの挿入
        fputcsv($stream, $data);
    }

    /**
     * CSVに書き込んでダウンロードするレスポンス返却
     *
     * @param mixed $records 出力対象レコード
     * @param string $filename ファイル名
     * @param mixed $header ヘッダー
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function downloadResponse(mixed $data, string $filename = 'sample.csv', $header = null)
    {
        return response()->streamDownload(
            fn () => $this->write($data, $header),
            $filename,
            ['Content-Type' => 'application/octet-stream']
        );
    }

    /**
     * 書き込みデータの配列化
     *
     * @param mixed $data 書き込みデータ
     * @param mixed $header ヘッダー（出力順序決定用）
     * @return array
     */
    public function toArray($data, $header = null)
    {
        // 配列化可能ならば配列化（CollectionやModelの処理）
        if ($data instanceof Arrayable) {
            $data = $data->toArray();
        }

        // stdClassならば配列化（クエリビルダ結果の処理）
        if (is_object($data)) {
            $data = (array) $data;
        }

        // 配列でない場合はエラー
        throw_if(!is_array($data), \Exception::class, 'CSVへの書き込み行が配列ではありません。');

        // ヘッダーがないならばそのまま返却
        if (is_null($header)) {
            return $data;
        }

        // データとヘッダーの長さが違う場合はエラー
        throw_if(count($data) !== count($header), \Exception::class, 'ヘッダーとデータの配列の長さが一致しません。');

        // ヘッダーの値でデータの並べ替え
        return collect($header)->map(function ($hd) use ($data) {
            // ヘッダー名で取得できなければエラー
            throw_unless(array_key_exists($hd, $data), \Exception::class, 'データからヘッダーの値を取得できません。');
            return $data[$hd];
        })->all();
    }


    /**
     * foreachで回せるようにする
     *
     * @param mixed $data
     * @return \Illuminate\Support\LazyCollection|\Illuminate\Support\Collection
     */
    public function toTraversable(mixed $data)
    {
        if ($data instanceof LazyCollection) {
            return $data;
        }
        return collect($data);
    }
}
