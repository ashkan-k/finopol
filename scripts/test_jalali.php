<?php
function jalaliToGregorian(int $jy, int $jm, int $jd): array
{
    $jy = $jy - 979;
    $jm = $jm - 1;
    $jd = $jd - 1;

    $j_day_no = 365 * $jy + (int)($jy / 33) * 8 + (int)(($jy % 33 + 3) / 4);
    for ($i = 0; $i < $jm; ++$i) {
        $j_day_no += ($i < 6) ? 31 : 30;
    }
    $j_day_no += $jd;

    $g_day_no = $j_day_no + 79;

    $gy = 1600 + 400 * (int)($g_day_no / 146097);
    $g_day_no = $g_day_no % 146097;

    $leap = true;
    if ($g_day_no >= 36525) {
        $g_day_no--;
        $gy += 100 * (int)($g_day_no / 36524);
        $g_day_no = $g_day_no % 36524;
        if ($g_day_no >= 365) $g_day_no++;
        else $leap = false;
    }

    $gy += 4 * (int)($g_day_no / 1461);
    $g_day_no %= 1461;

    if ($g_day_no >= 366) {
        $leap = false;
        $g_day_no -= 366;
        $gy += (int)($g_day_no / 365);
        $g_day_no = $g_day_no % 365;
    }

    $months = [31, ($leap ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    $gm = 0;
    $gd = 0;
    for ($i = 0; $i < 12; $i++) {
        if ($g_day_no < $months[$i]) {
            $gm = $i + 1;
            $gd = $g_day_no + 1;
            break;
        }
        $g_day_no -= $months[$i];
    }

    return [$gy, $gm, $gd];
}

function test($jy,$jm,$jd){
    list($gy,$gm,$gd)=jalaliToGregorian($jy,$jm,$jd);
    printf("Jalali %04d/%02d/%02d -> Gregorian %04d-%02d-%02d\n",$jy,$jm,$jd,$gy,$gm,$gd);
}

// Provided range
$from = [1404,7,1];
$to = [1404,7,30];

test(...$from);
test(...$to);

// Also test the sample created_at date
echo "Sample DB created_at: 2025-10-09 12:14:54\n";

// Print the full range as Gregorian dates
list($gy1,$gm1,$gd1)=jalaliToGregorian(...$from);
list($gy2,$gm2,$gd2)=jalaliToGregorian(...$to);
$start = sprintf('%04d-%02d-%02d 00:00:00', $gy1,$gm1,$gd1);
$end = sprintf('%04d-%02d-%02d 23:59:59', $gy2,$gm2,$gd2);
printf("Converted range: %s -> %s\n", $start, $end);

// Check inclusion of sample date
$sample = strtotime('2025-10-09 12:14:54');
$start_ts = strtotime($start);
$end_ts = strtotime($end);
printf("Sample ts: %d, start ts: %d, end ts: %d\n", $sample,$start_ts,$end_ts);
if ($sample >= $start_ts && $sample <= $end_ts) echo "SAMPLE IS INSIDE RANGE\n"; else echo "SAMPLE IS OUTSIDE RANGE\n";
