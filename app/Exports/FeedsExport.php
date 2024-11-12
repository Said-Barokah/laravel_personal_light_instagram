<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class FeedsExport implements FromCollection, WithHeadings
{
    protected $feeds;

    public function __construct($feeds)
    {
        $this->feeds = $feeds;
    }

    public function collection(): Collection
    {
        // Transform the collection to include only necessary fields
        return $this->feeds->map(function ($feed) {
            return [
                'Media' => $feed->media_type,
                'Date' => $feed->created_at->format('Y-m-d H:i'),
                'Caption' => $feed->caption,
            ];
        });
    }

    public function headings(): array
    {
        return ['Media', 'Date', 'Caption'];
    }
}
