<?php
/**
 * إعدادات ووردبريس الأساسية
 *
 * عملية إنشاء الملف wp-config.php تستخدم هذا الملف أثناء التنصيب. لا يجب عليك
 * استخدام الموقع، يمكنك نسخ هذا الملف إلى "wp-config.php" وبعدها ملئ القيم المطلوبة.
 *
 * هذا الملف يحتوي على هذه الإعدادات:
 *
 * * إعدادات قاعدة البيانات
 * * مفاتيح الأمان
 * * بادئة جداول قاعدة البيانات
 * * المسار المطلق لمجلد الووردبريس
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** إعدادات قاعدة البيانات - يمكنك الحصول على هذه المعلومات من مستضيفك ** //

/** اسم قاعدة البيانات لووردبريس */
define( 'DB_NAME', 'ansdsworks_toki' );

/** اسم مستخدم قاعدة البيانات */
define( 'DB_USER', 'ansdsworks_toki' );

/** كلمة مرور قاعدة البيانات */
define( 'DB_PASSWORD', 'w62-O^l5e[H8' );

/** عنوان خادم قاعدة البيانات */
define( 'DB_HOST', 'localhost' );

/** ترميز قاعدة البيانات */
define( 'DB_CHARSET', 'utf8mb4' );

/** نوع تجميع قاعدة البيانات. لا تغير هذا إن كنت غير متأكد */
define( 'DB_COLLATE', '' );

/**#@+
 * مفاتيح الأمان.
 *
 * تغيير هذه العبارات إلى عبارات فريدة مختلفة!
 * استخدم الرابط التالي لتوليد المفاتيح {@link https://api.wordpress.org/secret-key/1.1/salt/}
 * يمكنك تغيير هذه في أي وقت لإلغاء جميع ملفات تعريف الارتباط الموجودة. سيؤدي هذا إلى إجبار جميع المستخدمين على تسجيل الدخول مرة أخرى.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         't6fx/ne8Y$va9?a_a[*.7]=t,@n9&<#?vv9h_Z!JYS#lI/@%x/_6t9k4qAI+-s=@' );
define( 'SECURE_AUTH_KEY',  'tu]@?TvX;BTI.~Ts]iBGu3ifV130!lT.dcO gs|9->jad 8Qrr~VYuh28c97BlIf' );
define( 'LOGGED_IN_KEY',    '-,@H!.S!jE+^A&:~n%HG@Ag@eb.NM<XF@|W3twQCfUw1d/ZA@gSoWG!N!J/mOve.' );
define( 'NONCE_KEY',        'DI{B}RWfiu@N.r5M|ft{_GA^$S{qpXZA:&D7TKve;aSN44teIj7FfRz vHL~ h]8' );
define( 'AUTH_SALT',        'MQ>!RxDQ*.neWwB@Y^J)(5m?CyON{3}P8,YiAp%i{n #kSRnv14T }PZ`QjGT-_{' );
define( 'SECURE_AUTH_SALT', 'TkS-gc;R^>FDI$eQWstF(tH<tVUh*q-6BYOV_I73go]d8j8>:YTxyH+[xMGTqNt<' );
define( 'LOGGED_IN_SALT',   'X|yIfu3L#P:|VKj.at{mouofI<TDHE91l:{Ru<c9cRmV@#r@upmZSq0LE_O)PWMz' );
define( 'NONCE_SALT',       '5*VY^cxT-qq7R)(p {Pf15B{P{yI4&S1BIG|1y#{,8qr|5B+Mo`,0Un{%N5Ppck0' );

/**#@-*/

/**
 * بادئة الجداول في قاعدة البيانات.
 *
 * تستطيع تركيب أكثر من موقع على نفس قاعدة البيانات إذا أعطيت لكل موقع بادئة جداول مختلفة
 * يرجى استخدام حروف، أرقام وخطوط سفلية فقط!
 */
$table_prefix = 'wp_';

/**
 * للمطورين: نظام تشخيص الأخطاء
 *
 * قم بتغييرالقيمة، إن أردت تمكين عرض الملاحظات والأخطاء أثناء التطوير.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
@ini_set( 'display_errors', '0' );
@error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE & ~E_WARNING );

if ( ! defined( 'WP_HOME' ) ) {
    $scheme = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ) ? 'https://' : 'http://';
    $host   = isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : '127.0.0.1:8000';
    define( 'WP_HOME', $scheme . $host );
    define( 'WP_SITEURL', $scheme . $host );
}

/* هذا هو المطلوب، توقف عن التعديل! نتمنى لك التوفيق. */

/** المسار المطلق لمجلد ووردبريس. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** إعداد متغيرات الووردبريس وتضمين الملفات. */
require_once ABSPATH . 'wp-settings.php';

