<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;

trait Csv
{
    /**
     * CSVにデータ書き込み
     *
     * @param \Illuminate\Database\Eloquent\Collection $records 出力対象レコード
     * @param Array<string> $headers CSVヘッダー
     * @return void
     */
    public function writeCsv(Collection $records, array $headers)
    {
        // 出力バッファをopen
        $stream = fopen('php://output', 'w');

        // 文字コードを変換して、文字化け回避
        stream_filter_prepend($stream, 'convert.iconv.utf-8/cp932//TRANSLIT');

        // CSVファイルにヘッダーを追加
        fputcsv($stream, $headers);

        // データがない場合
        if (! $records->count()) {
            fputcsv($stream, ['データが存在しません。']);
            fclose($stream);
            return;
        }

        // データの挿入
        foreach ($records as $record) {
            // ヘッダーの値をカラム名としてデータの配列化
            $row = collect($headers)
                ->map(fn ($header) => $record->$header)
                ->all();
            // 行の追加
            fputcsv($stream, $row);
        }

        fclose($stream);
    }

    /**
     * CSVに書き込んでダウンロード
     *
     * @param \Illuminate\Database\Eloquent\Collection $records 出力対象レコード
     * @param Array<string> $headers CSVヘッダー
     * @param string $filename ファイル名
     * @return \Illuminate\Http\Response
     */
    public function downloadCsv(Collection $records, array $headers, $filename = 'sample.csv')
    {
        return response()->streamDownload(
            fn () => $this->writeCsv($records, $headers),
            $filename,
            ['Content-Type' => 'application/octet-stream']
        );
    }
}
