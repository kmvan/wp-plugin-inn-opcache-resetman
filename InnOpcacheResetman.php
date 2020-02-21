<?php

// Plugin Name: INN Opcache Resetman | Opcache 重置者
// Plugin URI: https://inn-studio.com/inn-opcache-resetman
// Description: The plugin will help you reset the PHP opcache cache after WordPress upgrade. | 该插件能够在 WordPress 更新后重置 Opcache 缓存。
// Version: 1.0.0
// Author: INN STUDIO
// Author URI: https://inn-studio.com
// PHP Requires: 7.3.0
// License: GPL-3.0 or later

declare(strict_types = 1);

namespace InnStudio\Plugin\InnOpcacheResetman;

\defined('\\AUTH_KEY') || \http_response_code(403) && die;

new InnOpcacheResetman();

final class InnOpcacheResetman
{
    public function __construct()
    {
        if ( ! \function_exists('\\opcache_reset')) {
            return;
        }

        \add_action('upgrader_process_complete', function (): void {
            \opcache_reset();
        }, \PHP_INT_MAX);
    }
}
