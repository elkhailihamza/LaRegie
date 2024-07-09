<?php

namespace App\Exports;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ArticleExport implements FromView, ShouldAutoSize, WithStyles, WithHeadings
{
    use Exportable;

    private $articles;

    public function __construct()
    {
        $this->articles = Article::all();
    }
    public function view(): View
    {
        return view('exports.articles_excel', [
            'articles' => $this->articles,
        ]);
    }

    public function headings(): array
    {
        return [
            '#',
            'Nom',
            'Description',
            'Segment',
            'Famille',
            'Groupe',
            'Metier',
            'Created at',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['argb' => 'FFFFFFFF'],
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'color' => ['argb' => 'FF808080'],
                ],
            ],
        ];
    }
}
