<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Konten;
use App\Models\Tentang;

class NewContentNotification extends Notification
{
    use Queueable;

    protected $konten;

    public function __construct(Konten $konten)
    {
        $this->konten = $konten;
    }

    public function via($notifiable)
    {
        return ['mail']; // Atur channel notifikasi sesuai kebutuhan
    }

    public function toMail($notifiable)
    {
        $logoUrl = Tentang::select('logo')->first()->logo;
        $url = url('/'.$this->konten->kategori->slug.'/'.$this->konten->slug);

        return (new MailMessage)
                    ->subject('Konten Baru Ditambahkan: ' . $this->konten->judul)
                    ->greeting('Halo!')
                    ->line('Konten baru telah ditambahkan ke situs kami.')
                    ->line('**Judul:** ' . $this->konten->judul)
                    ->line('**Ringkasan:** ' . $this->konten->ringkas)
                    ->line('**Gambar:**')
                    ->line('<img src="' . asset('images/konten/' . $this->konten->img) . '" alt="Image" style="width: 100%; max-width: 600px;">')
                    ->line('<img src="' . asset('images/' . $logoUrl) . '" alt="Logo" style="width: 100%; max-width: 600px;">')
                    ->action('Lihat Konten', $url)
                    ->line('Terima kasih telah menggunakan aplikasi kami!')
                    ->markdown('emails.notifications.newcontent', ['konten' => $this->konten, 'url' => $url]);
    }

    public function toArray($notifiable)
    {
        return [
            'konten_id' => $this->konten->id,
            'judul' => $this->konten->judul,
        ];
    }
}
