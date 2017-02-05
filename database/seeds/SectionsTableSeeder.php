<?php

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['id' => 1, 'level_id' => 1, 'name' => 'Διοίκηση Επιχειρήσεων & Οικονομικά - Business'], /** κολλέγια  Bachelors 1-10 */
            ['id' => 2, 'level_id' => 1, 'name' => 'Ναυτιλιακά - Nautical Education'],
            ['id' => 3, 'level_id' => 1, 'name' => 'Τουρισμός - Tourism'],
            ['id' => 4, 'level_id' => 1, 'name' => 'Πληροφορική - Informatics & Technology'],
            ['id' => 5, 'level_id' => 1, 'name' => 'Επιστήμες Υγείας - Health Sciences'],
            ['id' => 6, 'level_id' => 1, 'name' => 'Ανθρωπιστικές Επιστήμες - Humanities and Social Sciences'],
            ['id' => 7, 'level_id' => 1, 'name' => 'Πολυτεχνικές Σπουδές - Engineering'],
            ['id' => 8, 'level_id' => 1, 'name' => 'Πολιτισμός & Επικοινωνία'],
            ['id' => 9, 'level_id' => 1, 'name' => 'Liberal Arts & Sciences'],
            ['id' => 10, 'level_id' => 1, 'name' => 'Fine and Performing Arts'],

            ['id' => 11, 'level_id' => 3, 'name' => 'Διοίκηση Επιχειρήσεων & Οικονομικά - Business'], /** κολλέγια  Master 11-20 */
            ['id' => 12, 'level_id' => 3, 'name' => 'Ναυτιλιακά - Nautical Education'],
            ['id' => 13, 'level_id' => 3, 'name' => 'Τουρισμός - Tourism'],
            ['id' => 14, 'level_id' => 3, 'name' => 'Πληροφορική - Informatics & Technology'],
            ['id' => 15, 'level_id' => 3, 'name' => 'Επιστήμες Υγείας - Health Sciences'],
            ['id' => 16, 'level_id' => 3, 'name' => 'Ανθρωπιστικές Επιστήμες - Humanities and Social Sciences'],
            ['id' => 17, 'level_id' => 3, 'name' => 'Πολυτεχνικές Σπουδές - Engineering'],
            ['id' => 18, 'level_id' => 3, 'name' => 'Πολιτισμός & Επικοινωνία'],
            ['id' => 19, 'level_id' => 3, 'name' => 'Liberal Arts & Sciences'],
            ['id' => 20, 'level_id' => 3, 'name' => 'Fine and Performing Arts'],

            ['id' => 21, 'level_id' => 2, 'name' => 'Οικονομία & Διοίκηση'], /** IEK Επαγγελματικές Σπουδές 21-34 */
            ['id' => 22, 'level_id' => 2, 'name' => 'Επαγγέλματα Υγείας'],
            ['id' => 23, 'level_id' => 2, 'name' => 'Οπτικοακουστικά & Τέχνες'],
            ['id' => 24, 'level_id' => 2, 'name' => 'Τεχνικά Επαγγέλματα'],
            ['id' => 25, 'level_id' => 2, 'name' => 'Τουριστικά-Επισιτιστικά'],
            ['id' => 26, 'level_id' => 2, 'name' => 'Μόδα & Ομορφιά'],
            ['id' => 27, 'level_id' => 2, 'name' => 'Αισθητική & Spa'],
            ['id' => 28, 'level_id' => 2, 'name' => 'Παιδαγωγικά'],
            ['id' => 29, 'level_id' => 2, 'name' => 'Ηχοληψία & Μουσική Τεχνολογία'],
            ['id' => 30, 'level_id' => 2, 'name' => 'ΗΥ & Νέες Τεχνολογίες'],
            ['id' => 31, 'level_id' => 2, 'name' => 'Εφαρμοσμένες Τέχνες'],
            ['id' => 32, 'level_id' => 2, 'name' => 'ΜΜΕ & Αθλητισμός'],
            ['id' => 33, 'level_id' => 2, 'name' => 'Αγροτική Κατάρτιση - Γεωργικές Σπουδές - Γεωπονία'],
            ['id' => 34, 'level_id' => 2, 'name' => 'Φροντίδα Ζώων'],

            ['id' => 35, 'level_id' => 4, 'name' => 'Ομάδα Προσανατολισμού'], /** Φροντιστήρια Μέσης Εκπαίδευσης 35-38 */
            ['id' => 36, 'level_id' => 5, 'name' => 'Ομάδα Προσανατολισμού'],
            ['id' => 37, 'level_id' => 6, 'name' => 'Γενική Παιδεία'],

            ['id' => 38, 'level_id' => 22, 'name' => 'Ξένες Γλώσσες'], /** Φροντιστήρια Ξένων Γλωσσών Πληροφορικής 39-44 */
            ['id' => 39, 'level_id' => 23, 'name' => 'Ξένες Γλώσσες'],
            ['id' => 40, 'level_id' => 24, 'name' => 'Ξένες Γλώσσες'],
            ['id' => 41, 'level_id' => 22, 'name' => 'Πληροφορική-Ρομποτική'],
            ['id' => 42, 'level_id' => 23, 'name' => 'Πληροφορική-Ρομποτική'],
            ['id' => 43, 'level_id' => 24, 'name' => 'Πληροφορική-Ρομποτική'],

            ['id' => 44, 'level_id' => 25, 'name' => 'Μαθήματα Χορού'], /** Σχολές Χορού  45-47 */
            ['id' => 45, 'level_id' => 26, 'name' => 'Μαθήματα Χορού'],
            ['id' => 46, 'level_id' => 27, 'name' => 'Μαθήματα Χορού'],

            ['id' => 47, 'level_id' => 28, 'name' => 'Κλασσική Μουσική'], /** Ωδεία  48-53 */
            ['id' => 48, 'level_id' => 28, 'name' => 'Σύγχρονη-Μοντέρνα Μουσική'],
            ['id' => 49, 'level_id' => 28, 'name' => 'Παραδοσιακή-Βυζαντινή Μουσική'],
            ['id' => 50, 'level_id' => 28, 'name' => 'Musical'],
            ['id' => 51, 'level_id' => 28, 'name' => 'Φωνητική'],

            ['id' => 52, 'level_id' => 29, 'name' => 'Κλασσική Μουσική'],
            ['id' => 53, 'level_id' => 29, 'name' => 'Σύγχρονη-Μοντέρνα Μουσική'],
            ['id' => 54, 'level_id' => 29, 'name' => 'Παραδοσιακή-Βυζαντινή Μουσική'],
            ['id' => 55, 'level_id' => 29, 'name' => 'Musical'],
            ['id' => 56, 'level_id' => 29, 'name' => 'Φωνητική'],

            ['id' => 57, 'level_id' => 30, 'name' => 'Κλασσική Μουσική'],
            ['id' => 58, 'level_id' => 30, 'name' => 'Σύγχρονη-Μοντέρνα Μουσική'],
            ['id' => 59, 'level_id' => 30, 'name' => 'Παραδοσιακή-Βυζαντινή Μουσική'],
            ['id' => 60, 'level_id' => 30, 'name' => 'Musical'],
            ['id' => 61, 'level_id' => 30, 'name' => 'Φωνητική'],

            /* ['id' => 7-21,32 , 'name' => null], *//* Ιδιωτικά Λύκεια, Γυμνάσια, Δημοτικά */

        ];

        foreach ($categories as $category) {
            $section = new Section;
            $section->id = $category['id'];
            $section->level_id = $category['level_id'];
            $section->name = $category['name'];
            $section->save();
        }
    }
}
