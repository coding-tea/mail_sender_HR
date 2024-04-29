<?php

namespace App\Traits;

trait Alertable
{

    private function format(
        $title,
        $text,
        $alertType
    ): array {
        return [
            'alert' => [
                'title' => $title,
                'text' => $text,
                'icon' => $alertType
            ]
        ];
    }


    public function question($title = '', $text = ''): array
    {
        $alert = $this->format($title, $text, "question");
        session()->forget("alert");
        session()->put('alert', $alert);
        return $alert;
    }

    public function success($title = '', $text = ''): array
    {
        $alert = $this->format($title, $text, "success");
        session()->forget("alert");
        session()->put('alert', $alert);
        return $alert;
    }

    public function error($title = '', $text = '')
    {
        $alert = $this->format($title, $text, "error");
        session()->forget("alert");
        session()->put('alert', $alert);
        return $alert;
    }


    public function info($title = '', $text = '')
    {
        $alert = $this->format($title, $text, "info");
        session()->forget("alert");
        session()->put('alert', $alert);
        return $alert;
    }

    public function warning($title = '', $text = '')
    {
        $alert = $this->format($title, $text, "warning");
        session()->forget("alert");
        session()->put('alert', $alert);
        return $alert;
    }
}
