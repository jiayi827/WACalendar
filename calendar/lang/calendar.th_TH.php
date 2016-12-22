<?php
# th_TH translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.70
# Language: Thai / ภาษาไทย
# Translator: Ciprian using Google Translate
# Last file update: 21.07.2013
// Thailand mainly uses the Buddhist Era which is 543 years ahead of the Gregorian year. 1 January 2549 BE (AD 2006) 

// Class strings localization
define("L_DAYC", "วัน");
define("L_MONTHC", "เดือน");
define("L_YEARC", "ปี");
define("L_TODAY", "วันนี้");
define("L_PREV", "ย้อน");
define("L_NEXT", "ถัดไป");
define("L_REF_CAL", "ปฏิทินกิจกรรมรีเฟรช ...");
define("L_CHK_VAL", "ตรวจสอบค่า");
define("L_SEL_LANG", "เลือกภาษา");
define("L_SEL_ICON", "เลือก");
define("L_SEL_DATE", "เลือกวันที่");
define("L_ERR_SEL", "การเลือกของคุณไม่ถูกต้อง");
define("L_NOT_ALLOWED", "วันนี้ไม่ได้รับอนุญาตให้มีการเลือก");
define("L_DATE_BEFORE", "กรุณาเลือกวันที่ก่อน %s");
define("L_DATE_AFTER", "กรุณาเลือกวันหลังจาก %s");
define("L_DATE_BETWEEN", "กรุณาเลือกวันที่ระหว่าง\\n%s และ %s");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "ยกเลิก");
define("L_CLOSE", "ปิด");
define("L_WARN_2038", "รุ่นนี้ php server ของไม่ได้มีการสนับสนุนสำหรับปี 2038 และต่อมา! (<5.3.0)");
define("L_ERR_NOSET", "ข้อผิดพลาด! ค่าปฏิทินไม่สามารถตั้งค่า!");
define("L_VERSION", "เวอร์ชัน: %s (%s ภาษา)");
define("L_POWBY", "บนพื้นฐานต่อไป:"); //or "Based on:", "Supported by"
define("L_HERE", "ที่นี่");
define("L_UPDATE", "ปรับปรุง %s !");
define("L_TRANAME", "Google"); //Keep a short name
define("L_TRABY", "แปลโดย %s");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "มกราคม");
define("L_FEB", "กุมภาพันธ์");
define("L_MAR", "มีนาคม");
define("L_APR", "เมษายน");
define("L_MAY", "พฤษภาคม");
define("L_JUN", "มิถุนายน");
define("L_JUL", "กรกฏาคม");
define("L_AUG", "สิงหาคม");
define("L_SEP", "กันยายน");
define("L_OCT", "ตุลาคม");
define("L_NOV", "พฤศจิกายน");
define("L_DEC", "ธันวาคม");
// Months Short Names
define("L_S_JAN", "ม.ค.");
define("L_S_FEB", "ก.พ.");
define("L_S_MAR", "มี.ค.");
define("L_S_APR", "เม.ย.");
define("L_S_MAY", "พ.ค.");
define("L_S_JUN", "มิ.ย.");
define("L_S_JUL", "ก.ค.");
define("L_S_AUG", "ส.ค.");
define("L_S_SEP", "ก.ย.");
define("L_S_OCT", "ต.ค.");
define("L_S_NOV", "พ.ย.");
define("L_S_DEC", "ธ.ค.");
// Week days Long Names
define("L_MON", "จันทร์");
define("L_TUE", "อังคาร");
define("L_WED", "พุธ");
define("L_THU", "พฤหัสบดี");
define("L_FRI", "ศุกร์");
define("L_SAT", "เสาร์");
define("L_SUN", "อาทิตย์");
// Week days Short Names
define("L_S_MON", "จ");
define("L_S_TUE", "อ");
define("L_S_WED", "พ");
define("L_S_THU", "พฤ");
define("L_S_FRI", "ศ");
define("L_S_SAT", "ส");
define("L_S_SUN", "อา");

// Windows encoding
define("WIN_DEFAULT", "windows-874");
define("L_CAL_FORMAT", "%d %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "th_TH"); // en_US format of your language

// Set the RU specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "tha-tha.UTF-8", "tha-tha", "Thai.UTF-8", "Thai");
} else {
setlocale(LC_ALL, "th_TH.UTF-8", "tha.UTF-8", "tha_tha.UTF-8", "Thai.UTF-8");
}

// Thai Digits variant
define("L_ARABIC_DIGIT", "๐ , ๑, ๒, ๓, ๔, ๕, ๖, ๗, ๘, ๙");
define("L_DIGIT", 0); //Show Thai by default
define("L_UTF_DIGIT", 3616);
#define("L_ARABIC", "Arabic Digits"); // To switch to regular Arabic digits
define("L_INDIC", "ภาษาไทย");
?>