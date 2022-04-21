<?php

namespace App\Http\Controllers;

use App\Services\UtilService;

class SleepController extends Controller
{
  protected $utilService;

  protected $arr17 = [
    '001: 00000000000000                                                    00000000000000000000                          00000000                00000000000000000000000000',
    '002:     000000                                    00                      0000            0000                  00            00            00          0000        00',
    '003:     0000                                    0000                      0000              0000            0000                0000                    0000          ',
    '004:     0000                                    000000                    0000              000000          0000                0000                    0000          ',
    '005:     0000                                  00  0000                    0000                0000        0000                    0000                  0000          ',
    '006:     0000                                  00  000000                  0000              000000        0000                    0000                  0000          ',
    '007:     0000                                00      0000                  0000              0000        000000                    000000                0000          ',
    '008:     0000                                00      000000                0000            0000          0000                      000000                0000          ',
    '009:     0000                                00        0000                000000000000000000            0000                        0000                0000          ',
    '010:     0000                              00          0000                0000            000000        0000                        0000                0000          ',
    '011:     0000                              00          000000              0000              000000      000000                    000000                0000          ',
    '012:     0000                            00000000000000000000              0000                0000        0000                    0000                  0000          ',
    '013:     0000                            00              000000            0000                0000        0000                    0000                  0000          ',
    '014:     0000                          00                  0000            0000                0000          0000                0000                    0000          ',
    '015:     0000                00        00                  000000          0000              000000          0000                0000                    0000          ',
    '016:     0000              0000      0000                  000000          0000            000000              0000          0000                      000000          ',
    '017: 000000000000000000000000      00000000              000000000000  0000000000000000000000                      0000000000                      00000000000000      ',
  ];

  public function __construct(UtilService $utilService)
  {
    $this->utilService = $utilService;
  }

  protected function fnThrow(string $message): void
  {
    $this->utilService->throwHttpResponseException($message);
  }

  /**
   * 与えられた整数のミリ秒スリープする
   */
  protected function sleepMs(int $ms): void
  {
    // 0.5秒スリープさせるにはusleep(500000);
    // 0.05秒スリープさせるにはusleep(50000);
    // 0.005秒(5ミリ秒)スリープさせるにはusleep(5000);
    usleep($ms * 1000);
  }

  public function sleepApi(int $num): string
  {
    /* ガード処理 */
    // 許可する値は1以上かつ17以下である
    if ($num < 1 || 17 < $num) {
      $this->fnThrow('apiが対応していない数値です: ' . $num);
    }
    $idx = $num - 1; // 1-17 => 0-16
    $retStr = $this->arr17[$idx];

    /* sleep処理 */
    $ms = mt_rand(1, 500); // 最大0.5秒スリープする
    $this->sleepMs($ms);

    /* json返却処理 */
    return json_encode($retStr);
  }
}
