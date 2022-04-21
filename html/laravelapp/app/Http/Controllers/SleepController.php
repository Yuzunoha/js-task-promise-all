<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Services\UtilService;
use Illuminate\Http\Request;

class SleepController extends Controller
{
  protected $utilService;

  protected $arr17 = [
    '00000000000000                                                    00000000000000000000                          00000000                00000000000000000000000000',
    '    000000                                    00                      0000            0000                  00            00            00          0000        00',
    '    0000                                    0000                      0000              0000            0000                0000                    0000          ',
    '    0000                                    000000                    0000              000000          0000                0000                    0000          ',
    '    0000                                  00  0000                    0000                0000        0000                    0000                  0000          ',
    '    0000                                  00  000000                  0000              000000        0000                    0000                  0000          ',
    '    0000                                00      0000                  0000              0000        000000                    000000                0000          ',
    '    0000                                00      000000                0000            0000          0000                      000000                0000          ',
    '    0000                                00        0000                000000000000000000            0000                        0000                0000          ',
    '    0000                              00          0000                0000            000000        0000                        0000                0000          ',
    '    0000                              00          000000              0000              000000      000000                    000000                0000          ',
    '    0000                            00000000000000000000              0000                0000        0000                    0000                  0000          ',
    '    0000                            00              000000            0000                0000        0000                    0000                  0000          ',
    '    0000                          00                  0000            0000                0000          0000                0000                    0000          ',
    '    0000                00        00                  000000          0000              000000          0000                0000                    0000          ',
    '    0000              0000      0000                  000000          0000            000000              0000          0000                      000000          ',
    '000000000000000000000000      00000000              000000000000  0000000000000000000000                      0000000000                      00000000000000      ',
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
    $ms = 21 - $num; // 1なら20ms, 17なら4ms
    $this->sleepMs($ms);

    /* json返却処理 */
    return json_encode($retStr);
  }
}
