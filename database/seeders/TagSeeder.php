<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            'Allgemeines',
            'Service',
            'Medien',
            'Zahlung',
            'Quiz',
            'Datenschutz',
            'Compliance',
            'Management',
            'Produktion',
            'Zertifizierung',
            'Qualitätsmanagement',
            'Arbeitsschutz',
            'Umweltschutz',
            'Prüfverfahren',
            'Akkreditierung',
            'Schulung',
            'Weiterbildung',
            'eLearning',
            'Support',
            'IT-Sicherheit',
            'Technik',
            'Recycling',
            'Gefahrgut',
            'Transport',
            'Logistik',
            'Risikoanalyse',
            'Audits',
            'Energieeffizienz',
            'Nachhaltigkeit',
            'ISO 9001',
            'ISO 14001',
            'ISO 45001',
            'CE-Kennzeichnung',
            'Maschinensicherheit',
            'Produkthaftung',
            'Prozessoptimierung',
            'Gefährdungsbeurteilung',
            'Feuerwehr',
            'Erste Hilfe',
            'Brandschutz',
            'Arbeitsschutzgesetz',
            'Tarifvertrag',
            'Betriebsrat',
            'Arbeitszeit',
            'Homeoffice',
            'Ergonomie',
            'Gesundheitsmanagement',
            'Risikomanagement',
            'Supply Chain',
            'Lieferantenbewertung',
            'Kundenzufriedenheit',
            'Dokumentenmanagement',
            'Reklamation',
            'Auditbericht',
            'Fortbildung',
            'E-Learning-Plattform',
            'Webinar',
            'Seminar',
            'Zertifikat',
            'Prüfbericht',
            'Sicherheitsdatenblatt',
            'Gefahrstoffrecht',
        ];

        foreach ($tags as $name) {
            DB::table('tags')->insert([
                'name'       => $name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
