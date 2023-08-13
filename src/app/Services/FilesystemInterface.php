<?php
namespace App\Services;

interface FilesystemInterface
{
    /**
     * ファイルに書き込む
     *
     * @param mixed $data 書き込み内容
     * @param array $header ヘッダー
     * @return void
     */
    public function write(mixed $data, $header);

    /**
     * ストリームを開く
     *
     * @param string $filename
     * @param string $mode
     * @return resource
     */
    public function open(string $filename = 'php://output', string $mode = 'w');

    /**
     * ストリームを閉じる
     *
     * @param resource $stream
     * @return void
     */
    public function close($stream);

    /**
     * ストリームにフィルター付加
     *
     * @param resource $stream ストリーム
     * @param string $filter フィルタ名
     * @return void
     */
    public function filterStream($stream, string $filter = 'convert.iconv.utf-8/cp932//TRANSLIT');

    /**
     * データ書き込み（行）
     *
     * @param resource $stream ストリーム
     * @param mixed $data 書き込むデータ
     * @return void
     */
    public function writeRow($stream, mixed $data);

    /**
     * ダウンロードするレスポンス返却
     *
     * @param mixed $records 出力対象レコード
     * @param string $filename ファイル名
     * @param mixed $header ヘッダー
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function downloadResponse(mixed $data, string $filename = 'sample.csv', $header = null);
}
