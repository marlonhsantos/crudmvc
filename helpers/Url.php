<?php
class Url
{
    /**
     * Retorna a URL completa de um recurso da aplicação
     *
     * @param string $url
     * @return string
     */
    public static function baseUrl($url) {
        return BASE_URL.$url;
    }

    /**
     * Retorna a URL da raiz da aplicação
     *
     * @return string
     */
    public static function siteUrl() {
        return BASE_URL;
    }
}