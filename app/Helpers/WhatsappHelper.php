<?php

if (!function_exists('generateWhatsappLink')) {
    /**
     * Generate WhatsApp order link with pre-filled message.
     *
     * @param string $productName
     * @param string $phoneNumber
     * @return string
     */
    function generateWhatsappLink(string $productName, string $phoneNumber = '6281234567890'): string
    {
        $message = "Halo, saya ingin memesan produk *" . $productName . "*. Apakah stoknya masih tersedia?";
        return "https://wa.me/" . $phoneNumber . "?text=" . urlencode($message);
    }
}
