<?php

namespace App\Traits;

trait Alertable
{

    private function format(
        $text,
        $title,
        $alertType
    ): array {
        return [
            'alert' => [
                'text' => $text,
                'title' => $title,
                'icon' => $alertType
            ]
        ];
    }


    public function question($title = '', $text = ''): array
    {
        $alert = $this->format($title, $text, "question");
        session()->flush();
        session()->put('alert', $alert);
        return $alert;
    }

    public function success($title = '', $text = ''): array
    {
        $alert = $this->format($title, $text, "success");
        session()->flush();
        session()->put('alert', $alert);
        return $alert;
    }

    public function error($title = '', $text = '')
    {
        $alert = $this->format($title, $text, "error");
        session()->flush();
        session()->put('alert', $alert);
        return $alert;
    }


    public function info($title = '', $text = '')
    {
        $alert = $this->format($title, $text, "info");
        session()->flush();
        session()->put('alert', $alert);
        return $alert;
    }

    public function warning($title = '', $text = '')
    {
        $alert = $this->format($title, $text, "warning");
        session()->flush();
        session()->put('alert', $alert);
        return $alert;
    }
}
