<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HelloCommand extends Command
{


    public function __construct()
    {
        parent::__construct();
    }


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hello:class {--switch}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'サンプルコマンド（クラス）';



//  public function handle(): int
//    {
  
//     $switch = $this->option('switch');
//     $this->comment('Hello' . ($switch ? 'ON' : 'OFF'));
//     return 0;
//    }




    /**
     * Execute the console command.
     */
   public function handle(): int
   {
     $this->comment('処理を開始します...');

    // 緑色（成功メッセージ）
    $this->info('正常な処理のメッセージ');

    // 赤色（エラー）
    $this->error('エラーが発生しました！');

    // 黄色（警告）
    $this->warn('これは警告メッセージです');

    // 赤背景＋白文字（重大警告）
    $this->alert('重大な問題が発生しました！');

    // 装飾なし（普通の文字）
    $this->line('これは標準出力のテキストです');

    // スタイル付き line 出力（例：赤文字）
    $this->line('<fg=red>赤文字の line 出力</>');

     $this->newLine(1); // 改行

     $this->question('これはクエスチョンです');

    // --- テーブル出力 ---
    $this->table(
        ['ID', 'Name', 'Email'],
        [
            [1, 'Taro', 'taro@example.com'],
            [2, 'Hanako', 'hanako@example.com'],
        ]
    );

    $this->newLine(1);

    // --- プログレスバー ---
    $bar = $this->output->createProgressBar(5);
    $bar->start();
    for ($i = 0; $i < 5; $i++) {
        sleep(1); // 実行時間の代わり
        $bar->advance();
    }
    $bar->finish();
    $this->newLine(2);

    // --- ユーザー入力 ---
    $name = $this->ask('あなたの名前は？');
    $this->info("こんにちは, {$name} さん！");

    $password = $this->secret('パスワードを入力してください');
    $this->line("（入力は非表示でした: {$password}）");

    if ($this->confirm('本当に続行しますか？')) {
        $this->info('続行しました！');
    } else {
        $this->warn('処理をキャンセルしました');
    }

    $role = $this->choice(
        'ロールを選択してください',
        ['user', 'admin', 'guest'],
        0
    );
    $this->info("選択したロール: {$role}");


        return 100; // エラー終了コード
   }
}


