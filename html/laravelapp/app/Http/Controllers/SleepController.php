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

    /* json返却処理 */
    return json_encode($retStr);
  }
}
