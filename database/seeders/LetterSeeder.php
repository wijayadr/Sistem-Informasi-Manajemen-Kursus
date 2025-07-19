<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use App\Models\LetterDocumentRequirement;
use App\Models\LetterType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $letterTypes = [
            [
                'letter_name' => 'Surat Keterangan Usaha',
                'description' => 'Surat keterangan yang menyatakan bahwa seseorang memiliki usaha di wilayah tertentu'
            ],
            [
                'letter_name' => 'Surat Domisili',
                'description' => 'Surat keterangan tempat tinggal atau domisili seseorang'
            ],
            [
                'letter_name' => 'Surat Keterangan Tidak Mampu',
                'description' => 'Surat keterangan yang menyatakan kondisi ekonomi kurang mampu'
            ],
            [
                'letter_name' => 'Surat Tanah/Data Seluruh',
                'description' => 'Surat keterangan mengenai data kepemilikan tanah'
            ],
            [
                'letter_name' => 'Surat Rekomendasi',
                'description' => 'Surat rekomendasi untuk berbagai keperluan'
            ],
            [
                'letter_name' => 'Surat Kematian',
                'description' => 'Surat keterangan kematian seseorang'
            ],
            [
                'letter_name' => 'Surat Kelahiran',
                'description' => 'Surat keterangan kelahiran'
            ]
        ];

        foreach ($letterTypes as $letterType) {
            LetterType::create($letterType);
        }

        $documentTypes = [
            [
                'document_name' => 'KTP',
                'description' => 'Kartu Tanda Penduduk',
                'allowed_formats' => 'pdf,jpg,jpeg,png',
                'max_size_mb' => 2
            ],
            [
                'document_name' => 'KK',
                'description' => 'Kartu Keluarga',
                'allowed_formats' => 'pdf,jpg,jpeg,png',
                'max_size_mb' => 2
            ],
            [
                'document_name' => 'Pendukung Lainnya',
                'description' => 'Dokumen pendukung lainnya sesuai kebutuhan',
                'allowed_formats' => 'pdf,jpg,jpeg,png,doc,docx',
                'max_size_mb' => 5
            ]
        ];

        foreach ($documentTypes as $documentType) {
            DocumentType::create($documentType);
        }

        $letterTypes = LetterType::all();
        $documentTypes = DocumentType::all();

        // Semua jenis surat memerlukan semua jenis dokumen
        foreach ($letterTypes as $letterType) {
            foreach ($documentTypes as $documentType) {
                LetterDocumentRequirement::create([
                    'letter_type_id' => $letterType->id,
                    'document_type_id' => $documentType->id
                ]);
            }
        }
    }
}
