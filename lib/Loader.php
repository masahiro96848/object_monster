<?php

class Loader
{
    // オートロード対象のディレクトリを保持するプロパティ
    private $directories = [];

    // オートロード対象のフォルダのパスを$directoriesプロパティに配列形式で格納する
    public function regDirectory($dir)
    {
        $this->directories[] = $dir;
        return;
    }

    // クラスを読み込むオブジェクトを登録するメソッド
    public function register()
    {
        // 自分自身のlodaClass()メソッドをコールバックとして登録
        spl_autoload_register(array($this, 'loadClass'));
    }

    // register()によってオートロードに登録されたコールバック
    public function loadClass($className)
    {
        // パスを1個ずつ取り出す
        foreach($this->directories as $dir) {
            // クラスファイルへのパスを生成
            $filePath = $dir . "/" . $className . '.php';
            // $filePathが読み込めるかどうかのチェック
            if(is_readable($filePath)) {
                // 読み込めたら、requireして、ループ終了
                require $filePath;
                return;
            }
        }
    }
}

?>