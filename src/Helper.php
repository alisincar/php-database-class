<?php

/**
 * FONKSİYONLAR CLASS'I
 * STATİC FONKSİYON BARINDIRIR DİREK HELPER NAMESPACE'I YAZILARAK NEW DİYE OLUŞTURMADAN ULAŞILABİLİR
 * ÖR: Helper::dd($degisken);
 * */

namespace src;


class Helper
{
    /**
     * Değişken içeriğini siyah ekranda detaylı bir şekilde ekrana yazdırmaya yarar
     * Void fonksiyondur.
     * Tipi static her yerden erişilebilir.
     * */
    public static function dd($var)
    {
        ob_end_clean();
        $backtrace = debug_backtrace();
        echo "\n<pre style='background: #5a6268;color:#f0fff0;padding: 5px;'>\n";
        if (isset($backtrace[0]['file'])) {
            $filename = $backtrace[0]['file'];
            $filename = explode('\\', $filename);
            echo end($filename) . "\n\n";
        }
        echo "---------------------------------\n\n";
        var_dump($var);
        echo "</pre>\n";
        die;
    }


}