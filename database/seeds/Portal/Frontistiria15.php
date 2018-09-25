<?php

use App\Scholio\Scholio;
use Illuminate\Database\Seeder;
use Portal\Portal;

class Frontistiria15 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $background = Portal::createImages('/upload/school/univ.png')->id;




     /*=============== 1 Lets Learn ================*/

     $fake = factory(App\Models\School::class)->create([
         'user_id' => factory(App\User::class)->create(['name' => 'Ξένες Γλώσσες Lets Learn', 'email' => 'letslearn28@gmail.com', 'password' => bcrypt('123456'), 'role' => 'school', 'username' => 'letslearn'])->id,
         'address' => 'Γρηγορίου Αυξεντίου 37, Καματερό',
         'city' => 'Αθήνα',
         'phone' => 2102615888,
         'type_id' => 4,
         'website' => 'letslearn-ls.blogspot.com',
         'approved' => 1,
         'about' => '
            Το κέντρο ξένων γλωσσών Let\'s Learn λειτουργεί στο Καματερό, συγκεκριμένα στο Γεροβουνό, από τον Σεπτέμβριο του 2011, αρχικά στην οδό Τήνου 28, και αργότερα τον Γενάρη του 2015 όταν και έγινε η μεταστέγαση στην οδό Γρηγορίου Αυξεντίου 37. Στους χώρους μας διδάσκεται η Αγγλική, η Γαλλική και η Γερμανική γλώσσα σε παιδιά αλλά και σε ενήλικες. Η εκμάθηση της ξένης γλώσσας γίνεται με μεθοδικότητα, συνέπεια και ανθρωποκεντρική προσέγγιση με ιδιαίτερη έμφαση στις ανάγκες κάθε μαθητή ξεχωριστά. Αξιοποιώντας κάθε δυνατή μέθοδο αλλά και την δύναμη της σύγχρονης τεχνολογίας, έχουμε στρέψει την προσοχή και την προσήλωσή μας στην δημιουργική εκμάθηση της ξένης γλώσσας θέτοντας στόχους όχι μόνο την απόκτηση του επιθυμητού πτυχίου για τους σπουδαστές και τις σπουδάστριες αλλά και την γνώση σε ό,τι αφορά στον πολιτισμό και τα ήθη της αντίστοιχης με τη γλώσσα ξένης χώρας.
            Παρά το γεγονός πως διανύουμε μια εποχή κρίσης σχεδόν σε κάθε τομέα και γεμάτη προκλήσεις και δυσκολίες, τα ποσοστά επιτυχίας του κέντρου μας είναι υψηλά τόσο σε επίπεδο lower (Β2) αλλά και proficiency (C2). Αυτό συμβαίνει χάρη στην αφοσίωση, την εμπειρία και την αγάπη των εκπαιδευτικών μας για το λειτούργημα του δασκάλου. Έτσι σκοπεύουμε να πράξουμε και τα επόμενα χρόνια προσαρμόζοντας διαρκώς τις μεθόδους μας στις ανάγκες του κοινωνικού συνόλου που στρέφεται σε εμάς.
            ',
         'background' => $background,
     ]);

     new Portal($fake, 7, 'frontistirio');

     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Αγγλικά');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Γαλλικά');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Γερμανικά');

     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Αγγλικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Γαλλικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Γερμανικά');


       Scholio::portalSocial($fake, 'facebook', 'https://www.facebook.com/Lets-learn-478928312140810/');





     /*=============== 2 Αμουργιανός ================*/

     $fake = factory(App\Models\School::class)->create([
         'user_id' => factory(App\User::class)->create(['name' => 'Κέντρο Ξένων Γλωσσών Αμουργιανός', 'email' => 'info@amourgianos.edu.gr', 'password' => bcrypt('123456'), 'role' => 'school', 'username' => 'amourgianos'])->id,
         'address' => 'Μιχαλακοπούλου 98, Περιστέρι',
         'city' => 'Αθήνα',
         'phone' => 2105751820,
         'type_id' => 4,
         'website' => 'amourgianos.edu.gr',
         'approved' => 1,
         'about' => '
             Το Κέντρο Ξένων Γλωσσών Αμουργιανός μετρά 38 χρόνια απόλυτης επιτυχίας και ανοδικής πορείας στο χώρο της ξενόγλωσσης εκπαίδευσης. Ιδρυτής του σχολείου υπήρξε ο κος Αμουργιανός Αντώνης, ο οποίος καθιέρωσε πρωτοποριακές μεθόδους διδασκαλίας θέτοντας τις βάσεις για την περαιτέρω ανάπτυξη του σχολείου.
             Δώδεκα χρόνια τώρα ο κος Αμουργιανός Γεράσιμος σφραγίζει την πορεία του κέντρου με την άριστη τεχνογνωσία και κατάρτισή του ανοίγοντας νέους ορίζοντες στην ξενόγλωσση εκπαίδευση. Με πολυετείς σπουδές στην Αγγλική Γλωσσολογία (BA HONS in English Linguistics and Italian, UNIVERSITY OF WALES - SWANSEA) και εξειδίκευση στη διδασκαλία της Αγγλικής γλώσσας (Advanced Diploma - ESP - in teaching English as a foreign / second language TEFL / TESL - The English Language Centre London) έχει εισαγάγει νέες μεθόδους για τις ξεχωριστές ανάγκες του κάθε μαθητή εφαρμόζοντάς τες και με προσωπική διδασκαλία.
             Συνοδοιπόρος στην προσπάθεια αυτή είναι η κα Αμουργιανού Αγγελική, η οποία αποτελεί σημαντικό κομμάτι του συντονισμού και οργάνωσης του Κέντρου Ξένων Γλωσσών "Αμουργιανός".
            ',
         'background' => $background,
     ]);

     new Portal($fake, 7, 'frontistirio');

     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Αγγλικά');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Γαλλικά');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Γερμανικά');



     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Αγγλικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Γαλλικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Γερμανικά');








     /*=============== 3 Ευρωδιάσταση ================*/

     $fake = factory(App\Models\School::class)->create([
         'user_id' => factory(App\User::class)->create(['name' => 'Κέντρα Ξένων Γλωσσών Ευρωδιάσταση', 'email' => 'aig5eu@otenet.gr', 'password' => bcrypt('123456'), 'role' => 'school', 'username' => 'eurodiastasi'])->id,
         'address' => 'Χαλκοκονδύλη 5, Πλατεία Κάνιγγος',
         'city' => 'Αθήνα',
         'phone' => 2103844888,
         'type_id' => 4,
         'website' => 'eurodiastasi.gr',
         'approved' => 1,
         'about' => '
            Με 22 χρόνια δημιουργικής παρουσίας στο χώρο της ξενόγλωσσης εκπαίδευσης και 36.000 επιτυχημένους σπουδαστές στο ενεργητικό τους, τα Κέντρα Ξένων Γλωσσών Ευρωδιάσταση αποτελούν αδιαμφισβήτητα μία από τις καλύτερες επιλογές για οποιονδήποτε ενήλικο ενδιαφέρεται να μάθει σωστά και γρήγορα ξένες γλώσσες και να πιστοποιήσει τις γνώσεις του.
            Το προφίλ των Κέντρων Ξένων Γλωσσών Ευρωδιάσταση είναι απόλυτα συγκεκριμένο: απευθύνονται αποκλειστικά και μόνο σε συνειδητοποιημένους ενήλικες, οι οποίοι επιθυμούν να μάθουν γρήγορα, σοβαρά και σε ικανοποιητικό επίπεδο μία ή περισσότερες ξένες γλώσσες και να αποκτήσουν ένα ή περισσότερα πτυχία γλωσσομάθειας. Τα Κέντρα Ξένων Γλωσσών Ευρωδιάσταση ΔΕΝ απευθύνονται σε σπουδαστές οι οποίοι επιθυμούν να μάθουν μία γλώσσα με αργούς ρυθμούς και καθαρά ως "χόμπι". Είναι χαρακτηριστικό ότι το 90% των προγραμμάτων που παρέχουν τα Κέντρα Ξένων Γλωσσών Ευρωδιάσταση οδηγούν στην απόκτηση αναγνωρισμένου πτυχίου γλωσσομάθειας σε 7-14 μήνες. Ο χρόνος προετοιμασίας για την απόκτηση πτυχίου στα Κέντρα Ξένων Γλωσσών Ευρωδιάσταση είναι 2-3 φορές λιγότερος από το "σύνηθες", χωρίς καμία θυσία και συμβιβασμό σε θέματα ποιότητας, χωρίς την παραμικρή αντι-εκπαιδευτική περικοπή ωρών.
            Το υψηλό επίπεδο διοικητικής και ακαδημαϊκής οργάνωσης των σχολών μας, σε συνδυασμό με το μεγάλο αριθμό σπουδαστών που φοιτούν σε αυτές, μας επιτρέπει να παρέχουμε στους σπουδαστές μας μία μοναδική ευκολία: τη δυνατότητα αλλαγής ωραρίου, αναπλήρωσης μαθημάτων και εναλλάξ παρακολούθησης τμημάτων σε οποιοδήποτε χρονικό σημείο του προγράμματος που παρακολουθούν.
            Πολιτική διδάκτρων και παροχών: η ελκυστική πολιτική διδάκτρων και παροχών που ακολουθεί η Ευρωδιάσταση δίνει τη δυνατότητα σε όλους τους σπουδαστές, ανεξαρτήτως οικονομικών δυνατοτήτων, να παρακολουθήσουν τα προγράμματά μας. Η αναγνωρισιμότητα των σχολών μας μεταξύ των ενήλικων σπουδαστών, γεγονός που καθιστά περιττή την προσφυγή τους σε πολυδάπανες διαφημιστικές ενέργειες, μας επιτρέπει να μην επιβαρύνουμε τους σπουδαστές μας με οποιοδήποτε άλλο κόστος πέραν αυτού που αφορά στην παροχή του εκπαιδευτικού μας έργου.
            ',
         'background' => $background,
     ]);

     new Portal($fake, 8, 'frontistirio');



     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Αγγλικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Γαλλικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Γερμανικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Ισπανικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Ιταλικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Ρωσικά');

     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Προετοιμασία Πιστοποίησης', 'IELTS');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Προετοιμασία Πιστοποίησης', 'TOEFL');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Προετοιμασία Πιστοποίησης', 'TOEIC');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Προετοιμασία Πιστοποίησης', 'GMAT');



       Scholio::portalSocial($fake, 'facebook', 'https://www.facebook.com/eurodiastasi');




     /*=============== 4 ================*/

     $fake = factory(App\Models\School::class)->create([
         'user_id' => factory(App\User::class)->create(['name' => 'Ξένες Γλώσσες', 'email' => '', 'password' => bcrypt('123456'), 'role' => 'school', 'username' => ''])->id,
         'address' => '',
         'city' => 'Αθήνα',
         'phone' => 210,
         'type_id' => 4,
         'website' => '',
         'approved' => 1,
         'about' => '

            ',
         'background' => $background,
     ]);

     new Portal($fake, 5, 'frontistirio');

     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Αγγλικά');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Γαλλικά');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Γερμανικά');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Ισπανικά');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Ιταλικά');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Ρωσικά');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Τούρκικα');


     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Αγγλικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Γαλλικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Γερμανικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Ισπανικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Ιταλικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Ρωσικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Τούρκικα');

     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Προετοιμασία Πιστοποίησης', 'IELTS');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Προετοιμασία Πιστοποίησης', 'TOEFL');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Προετοιμασία Πιστοποίησης', 'TOEIC');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Προετοιμασία Πιστοποίησης', 'GMAT');


     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Εκπαιδευτική Ρομποτική', 'Προγραμματισμός με ρομπότ');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Εκπαιδευτική Ρομποτική', 'LEGO Education');

     Scholio::portalStudy($fake, 'Τμήματα Εφήβων - Ενηλίκων', 'Πληροφορική', 'Πιστοποίηση');

//       Scholio::portalSocial($fake, 'facebook', 'https://www.facebook.com/');
//       Scholio::portalSocial($fake, 'instagram', 'https://www.instagram.com/');
//       Scholio::portalSocial($fake, 'youtube', 'https://www.youtube.com/');





     /*=============== 5 ================*/

     $fake = factory(App\Models\School::class)->create([
         'user_id' => factory(App\User::class)->create(['name' => 'Ξένες Γλώσσες', 'email' => '', 'password' => bcrypt('123456'), 'role' => 'school', 'username' => ''])->id,
         'address' => '',
         'city' => 'Αθήνα',
         'phone' => 210,
         'type_id' => 4,
         'website' => '',
         'approved' => 1,
         'about' => '

            ',
         'background' => $background,
     ]);

     new Portal($fake, 5, 'frontistirio');

     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Αγγλικά');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Γαλλικά');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Γερμανικά');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Ισπανικά');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Ιταλικά');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Ρωσικά');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Ξένες Γλώσσες', 'Τούρκικα');


     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Αγγλικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Γαλλικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Γερμανικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Ισπανικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Ιταλικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Ρωσικά');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Ξένες Γλώσσες', 'Τούρκικα');

     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Προετοιμασία Πιστοποίησης', 'IELTS');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Προετοιμασία Πιστοποίησης', 'TOEFL');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Προετοιμασία Πιστοποίησης', 'TOEIC');
     Scholio::portalStudy($fake, 'Τμήματα Ενηλίκων', 'Προετοιμασία Πιστοποίησης', 'GMAT');


     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Εκπαιδευτική Ρομποτική', 'Προγραμματισμός με ρομπότ');
     Scholio::portalStudy($fake, 'Παιδικά Τμήματα', 'Εκπαιδευτική Ρομποτική', 'LEGO Education');

     Scholio::portalStudy($fake, 'Τμήματα Εφήβων - Ενηλίκων', 'Πληροφορική', 'Πιστοποίηση');

//       Scholio::portalSocial($fake, 'facebook', 'https://www.facebook.com/');
//       Scholio::portalSocial($fake, 'instagram', 'https://www.instagram.com/');
//       Scholio::portalSocial($fake, 'youtube', 'https://www.youtube.com/');






    }



}
