<?php

use App\Models\School;
use App\Scholio\Scholio;
use Illuminate\Database\Seeder;
use Portal\Portal;

class SeedA2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $background = Portal::createImages('/upload/school/univ.png')->id;

        // /*=============== Karavana ok ================*/

         $karavana = factory(App\Models\School::class)->create([
             'user_id' => factory(App\User::class)->create(['name' => 'Σχολή Καραβάνα', 'email' => 'info@karavana.gr', 'password' => bcrypt('123456'), 'role' => 'school', 'username' => 'karavana'])->id,
             'address' => '6ο χλμ Περιφερειακής Οδού Λαρίσης Τρικάλων',
             'city' => 'Λάρισα',
            'phone' => 2410660435,
            'type_id' => 13,
            'website' => 'www.karavana.gr',
            'approved' => 1,
            'about' => 'Η Σχολή  Καραβάνα ιδρύθηκε με σκοπό να εκπληρώσει το όραμα του ιδρυτή της για παροχή υψηλού επιπέδου εκπαίδευσης στους μαθητές της και διακρίθηκε για την ξεχωριστή της φιλοσοφία στην εκπαίδευση.

            Το σχολείο  μας είναι ένας ζωντανός, δυναμικός οργανισμός που εξελίσσεται και προχωρά ανοδικά, βελτιώνοντας συνεχώς τις υπηρεσίες που προσφέρει, χτίζοντας γερές βάσεις και προετοιμάζοντας τα παιδιά για την κοινωνία που εκείνα θα ζήσουν, την κοινωνία του αύριο.

            Βασικές αρχές της φιλοσοφίας της  είναι αυτές που αναγράφονται στο λογότυπο: «Ελληνική Παιδεία – Ευρωπαϊκή Εκπαίδευση».

             «Ελληνική Παιδεία» γιατί οι αρχές της ελληνικής παιδείας αποτελούν το θεμέλιο λίθο της εκπαίδευσης όχι μόνο στην Ελλάδα αλλά και σε όλο τον σύγχρονο κόσμο. Ελλάδα και παιδεία είναι έννοιες ταυτόσημες στην παγκόσμια συνείδηση σε όλες τις εποχές, έννοιες επίσης ταυτόσημες με τον πολιτισμό, όπου γνώση και στοχασμός, δεξιότητα και δημιουργία, σωματική και πνευματική καλλιέργεια, εργασία και αναψυχή  συμβαδίζουν αρμονικά. «Ελληνική Παιδεία» γιατί ανήκει στο παρελθόν όλων μας, αλλά και γιατί είναι το καλύτερο εχέγγυο για το μέλλον! Και «Ευρωπαϊκή εκπαίδευση» γιατί τα παιδιά μας είναι ευρωπαίοι πολίτες μιας παγκόσμιας πλέον κοινωνίας. Πρέπει να έχουν γνώσεις και δεξιότητες, ισχυρό χαρακτήρα και ολοκληρωμένη προσωπικότητα, για να εξελιχθούν και να προοδεύσουν.

            Βασικές αρχές

            Πιστεύουμε ότι:

            1) Το σχολείο οφείλει να μορφώνει ουσιαστικά τους μαθητές εφαρμόζοντας ένα ολοκληρωμένο πρόγραμμα σπουδών που να ανταποκρίνεται στις αυξημένες απαιτήσεις των καιρών.

            2) Μόνο η αγάπη για το σχολείο και η θετική στάση απέναντι στη μάθηση οδηγούν σε επιτυχημένη σχολική πορεία.

            3) Το καλό σχολείο πρέπει να ασχολείται συστηματικά με την διαπαιδαγώγηση των μαθητών και την ολόπλευρη ανάπτυξη της προσωπικότητάς τους.

            4)  Η πορεία ενός επιτυχημένου και ευτυχισμένου ανθρώπου ξεκινά από πολύ νωρίς στη ζωή του και εξαρτάται από πολλούς παράγοντες. Στη Σχολή Καραβάνα θέλουμε άριστους μαθητές αλλά και επιτυχημένους και ευτυχισμένους ενήλικες. Το πρόγραμμα του σχολείου είναι δομημένο κατά τέτοιο τρόπο ώστε οι απόφοιτοί του να είναι προετοιμασμένοι για τον ανταγωνισμό που θα συναντήσουν σε όλα τα επίπεδα – επαγγελματικά και κοινωνικά. Ασχολούμαστε με τον κάθε μαθητή χωριστά, φροντίζοντας για τις ανάγκες του και ενισχύοντας τις ιδιαίτερες ικανότητες και τα ταλέντα του. Αυτά άλλωστε μας κάνουν να ξεχωρίζουμε από τα άλλα ιδιωτικά σχολεία.
            ',
            'background' => $background,
        ]);

        new Portal($karavana, 5, 'school');

        Scholio::portalStudy($karavana, 'Νηπιαγωγείο', 'Νήπια', 'Νήπια');
        Scholio::portalStudy($karavana, 'Νηπιαγωγείο', 'Προνήπια', 'Προνήπια');

        Scholio::portalStudy($karavana, 'Δημοτικό', 'Γενική Παιδεία', 'Ά Δημοτικού');
        Scholio::portalStudy($karavana, 'Δημοτικό', 'Γενική Παιδεία', '΄Β Δημοτικού');
        Scholio::portalStudy($karavana, 'Δημοτικό', 'Γενική Παιδεία', '΄Γ Δημοτικού');
        Scholio::portalStudy($karavana, 'Δημοτικό', 'Γενική Παιδεία', '΄Δ Δημοτικού');
        Scholio::portalStudy($karavana, 'Δημοτικό', 'Γενική Παιδεία', '΄Έ Δημοτικού');
        Scholio::portalStudy($karavana, 'Δημοτικό', 'Γενική Παιδεία', 'ΣΤ Δημοτικού');

        Scholio::portalStudy($karavana, 'Γυμνάσιο', 'Γενική Παιδεία', 'Ά Γυμνασίου');
        Scholio::portalStudy($karavana, 'Γυμνάσιο', 'Γενική Παιδεία', '΄Β Γυμνασίου');
        Scholio::portalStudy($karavana, 'Γυμνάσιο', 'Γενική Παιδεία', '΄Γ Γυμνασίου');
        Scholio::portalStudy($karavana, 'Λύκειο', 'Γενική Παιδεία', 'Ά Λυκείου');
        Scholio::portalStudy($karavana, 'Λύκειο', 'Γενική Παιδεία', '΄Β Λυκείου');
        Scholio::portalStudy($karavana, 'Λύκειο', 'Γενική Παιδεία', '΄Γ Λυκείου');

        Scholio::portalSocial($karavana, 'facebook', 'https://www.facebook.com/sxoliKaravana/');
        Scholio::portalSocial($karavana, 'google', 'https://www.google.gr/maps/place/%CE%A3%CF%87%CE%BF%CE%BB%CE%AE+%CE%9A%CE%B1%CF%81%CE%B1%CE%B2%CE%AC%CE%BD%CE%B1+Sxoli+Karavana/@39.6017731,22.4220863,17z/data=!3m1!4b1!4m5!3m4!1s0x13588f5990d147d9:0xaaca83719f10cc92!8m2!3d39.601769!4d22.424275');
        Scholio::portalSocial($karavana, 'youtube', 'https://www.youtube.com/user/sxolh5');



        // // /*=============== Ekp. Athina ok ================*/

        $ekathina = factory(App\Models\School::class)->create([
            'user_id' => factory(App\User::class)->create(['name' => 'Εκπαιδευτήρια Αθηνά', 'email' => 'athina-sch@otenet.gr', 'password' => bcrypt('123456'), 'role' => 'school', 'username' => 'ekathina'])->id,
            'address' => '6o χλμ Τρικάλων-Καλαμπάκας',
            'city' => 'Τρίκαλα',
            'phone' => 2431088600,
            'type_id' => 13,
            'website' => 'www.athina-sch.gr',
            'approved' => 1,
            'about' => 'Τα εκπαιδευτήρια "Αθηνά" αποτελούν έναν ολοκληρωμένο Εκπαιδευτικό Οργανισμό, ο οποίος παρέχει γενική παιδεία υψηλού επιπέδου και προετοιμάζει τους μαθητές να ανταποκριθούν στις σύγχρονες απαιτήσεις της ζωής και της νέας εποχής που διαμορφώνεται. Μιας εποχής που απαιτεί ουσιαστική πνευματική καλλιέργεια, σύγχρονες γνώσεις, ηθική συγκρότηση, πολύπλευρη και δημιουργική προσωπικότητα. Με αυτό το μήνυμα τα Εκπαιδευτήρια "Αθηνά" φιλοδοξούν να διαμορφώσουν τον πολίτη του 21ου αιώνα που θα έχει αφομοιώσει τις αξίες του Ελληνικού πολιτισμού, θα ανταποκρίνεται στις απαιτήσεις μιας παγκοσμιοποιημένης κοινωνίας και θα οραματίζεται ένα δημιουργικό μέλλον.

            Πιστεύοντας βαθιά στην παιδευτική λειτουργία της Εκπαίδευσης, έχουν θέσει ως αποστολή τους τη διαμόρφωση ανθρώπων με άρτια πνευματική συγκρότηση, υψηλό ήθος και υποδειγματική υπευθυνότητα. Ανθρώπων ικανών να ανταποκριθούν στις απαιτήσεις και τις προκλήσεις της σύγχρονης εποχής και οι οποίοι θα ενταχθούν στο κοινωνικό σύνολο ως δημιουργικά μέλη και ενεργοί πολίτες.

            Αυτήν την υψηλή τους αποστολή τα Εκπαιδευτήρια υπηρετούν με εκπαιδευτικό προσωπικό υψηλής επιστημονικής και παιδαγωγικής κατάρτισης, τέλειες εγκαταστάσεις, άριστη οργάνωση και με ένα διευρυμένο, σύγχρονο και ποιοτικό πρόγραμμα σπουδών το οποίο προσδιορίζεται από τους ακόλουθους στόχους:

            τη μετάδοση ανθρωπιστικών αξιών, αρχών και ιδανικών
            τη διεύρυνση του πνευματικού ορίζοντα των μαθητών και κυρίως την ανάπτυξη της κριτικής και δημιουργικής σκέψης
            την άριστη γνωστική κατάρτιση των μαθητών που θα τους επιτρέψει την απρόσκοπτη συνέχιση των σπουδών τους στην Τριτοβάθμια Εκπαίδευση
            το σεβασμό της Εθνικής μας Κληρονομιάς και Παράδοσης
            την αγάπη για τη φύση και την ευαισθητοποίηση σε θέματα προστασίας του περιβάλλοντος
            τη γόνιμη γνωριμία με την Τέχνη, την Επιστήμη και την Τεχνολογία
            την ενθάρρυνση της σωστής σωματικής άσκησης και της αγάπης για τον αθλητισμό
            την προετοιμασία των μαθητών ως πολιτών της Ελλάδας, της Ευρώπης και του Κόσμου',
            'background' => $background,
        ]);

        new Portal($ekathina, 5, 'school');

        Scholio::portalStudy($ekathina, 'Γυμνάσιο', 'Γενική Παιδεία', 'Ά Γυμνασίου');
        Scholio::portalStudy($ekathina, 'Γυμνάσιο', 'Γενική Παιδεία', '΄Β Γυμνασίου');
        Scholio::portalStudy($ekathina, 'Γυμνάσιο', 'Γενική Παιδεία', '΄Γ Γυμνασίου');
        Scholio::portalStudy($ekathina, 'Λύκειο', 'Γενική Παιδεία', 'Ά Λυκείου');
        Scholio::portalStudy($ekathina, 'Λύκειο', 'Γενική Παιδεία', '΄Β Λυκείου');
        Scholio::portalStudy($ekathina, 'Λύκειο', 'Γενική Παιδεία', '΄Γ Λυκείου');

        Scholio::portalSocial($ekathina, 'facebook', 'https://www.facebook.com/athinasch.gr');




        // // /*=============== Ekp. Anagennisi ok ================*/

        $ekanagenisi = factory(App\Models\School::class)->create([
            'user_id' => factory(App\User::class)->create(['name' => 'Εκπαιδευτήρια ΑΝΑΓΕΝΝΗΣΗ ΙΚΕ', 'email' => 'info@anagennisiedu.gr', 'password' => bcrypt('123456'), 'role' => 'school', 'username' => 'ekanagennisi'])->id,
            'address' => 'Γηροκομείου 61',
            'city' => 'Πάτρα',
            'phone' => 2610224260,
            'type_id' => 13,
            'website' => 'anagennisiedu.gr',
            'approved' => 1,
            'about' => 'Είμαστε μια ομάδα εκπαιδευτικών, που βασιζόμενοι στην αγάπη μας για την Εκπαίδευση, δημιουργήσαμε στην Πάτρα τα Εκπαιδευτήρια «Αναγέννηση». Κεφάλαιό μας η αγάπη για τη μάθηση και το μαθητή και ισχυρό μας εφόδιο η  πολυετής εμπειρία μας στο χώρο της    ιδιωτικής εκπαίδευσης.

                Όραμά μας…
                « Ένα σχολείο που θεωρεί τον κάθε   μαθητή ξεχωριστό, μια προσωπικότητα μοναδική με τις ευαισθησίες, τις ιδιαιτερότητες, τις ανησυχίες, τα όνειρα και τις φιλοδοξίες του, τα προβλήματα και τους προβληματισμούς του.

                Ένα σχολείο που προσφέρει ένα περιβάλλον αγάπης, ασφάλειας και αποδοχής, στο οποίο ο καθένας έχει τη θέση του και τη συμπαράσταση που χρειάζεται, για να αποκτήσει αυτοεκτίμηση, να ανακαλύψει και να αξιοποιήσει τις ικανότητες και τις κλίσεις του.

                Ένα σχολείο που αξιοποιεί την πλούσια παράδοση του τόπου μας στην προσπάθειά του να διαμορφώσει ενεργούς πολίτες με ανεπτυγμένη κοινωνική συνείδηση»',
            'background' => $background,
        ]);

        new Portal($ekanagenisi, 5, 'school');

        Scholio::portalStudy($ekanagenisi, 'Νηπιαγωγείο', 'Νήπια', 'Νήπια');
        Scholio::portalStudy($ekanagenisi, 'Νηπιαγωγείο', 'Προνήπια', 'Προνήπια');

        Scholio::portalStudy($ekanagenisi, 'Δημοτικό', 'Γενική Παιδεία', 'Ά Δημοτικού');
        Scholio::portalStudy($ekanagenisi, 'Δημοτικό', 'Γενική Παιδεία', '΄Β Δημοτικού');
        Scholio::portalStudy($ekanagenisi, 'Δημοτικό', 'Γενική Παιδεία', '΄Γ Δημοτικού');
        Scholio::portalStudy($ekanagenisi, 'Δημοτικό', 'Γενική Παιδεία', '΄Δ Δημοτικού');
        Scholio::portalStudy($ekanagenisi, 'Δημοτικό', 'Γενική Παιδεία', '΄Έ Δημοτικού');
        Scholio::portalStudy($ekanagenisi, 'Δημοτικό', 'Γενική Παιδεία', 'ΣΤ Δημοτικού');

        Scholio::portalStudy($ekanagenisi, 'Γυμνάσιο', 'Γενική Παιδεία', 'Ά Γυμνασίου');
        Scholio::portalStudy($ekanagenisi, 'Γυμνάσιο', 'Γενική Παιδεία', '΄Β Γυμνασίου');
        Scholio::portalStudy($ekanagenisi, 'Γυμνάσιο', 'Γενική Παιδεία', '΄Γ Γυμνασίου');
        Scholio::portalStudy($ekanagenisi, 'Λύκειο', 'Γενική Παιδεία', 'Ά Λυκείου');
        Scholio::portalStudy($ekanagenisi, 'Λύκειο', 'Γενική Παιδεία', '΄Β Λυκείου');
        Scholio::portalStudy($ekanagenisi, 'Λύκειο', 'Γενική Παιδεία', '΄Γ Λυκείου');

        Scholio::portalSocial($ekanagenisi, 'facebook', 'http://www.facebook.com/sharer.php?u=http://anagennisiedu.gr/poioi-eimaste/');
        Scholio::portalSocial($ekanagenisi, 'google', 'https://plus.google.com/share?url=http://anagennisiedu.gr/poioi-eimaste/');
        Scholio::portalSocial($ekanagenisi, 'twitter', 'http://twitter.com/share?url=http://anagennisiedu.gr/poioi-eimaste/&text=%CE%A0%CE%9F%CE%99%CE%9F%CE%99%20%CE%95%CE%99%CE%9C%CE%91%CE%A3%CE%A4%CE%95%20');



        // // /*=============== Pagkriteio ok ================*/


        $pagkriteio = factory(App\Models\School::class)->create([
            'user_id' => factory(App\User::class)->create(['name' => 'Εκπαιδευτήριο ΤΟ ΠΑΓΚΡΗΤΙΟΝ', 'email' => 'dimotiko@pagkritio.gr', 'password' => bcrypt('123456'), 'role' => 'school', 'username' => 'pagkriteio'])->id,
            'address' => 'Οδός Πανδάρεω 61, Φιλοθέη - Αγ. Ιωάννης',
            'city' => 'Ηράκλειο',
            'phone' => 2810230379,
            'type_id' => 13,
            'website' => 'www.pagkritio.gr',
            'approved' => 1,
            'about' => 'Το Εκπαιδευτήριο “ΤΟ ΠΑΓΚΡΗΤΙΟΝ” ιδρύθηκε το 1963 μέσα σε πνεύμα δημιουργίας και ανανέωσης. «Η παιδεία οφείλει να ξεφύγει από τη συντηρητικότητα και να μπει περισσότερο στη γνώση της ζωής και στον αγώνα για μια σωστή ελευθερία του πνεύματος», έγραφε τότε το πρώτο ιστορικό φυλλάδιο γνωριμίας του σχολείου.  Με αφετηρία  αυτές τις σταθερές αρχές, η πορεία του υπήρξε σταθερή και ανοδική. Σήμερα, όλες οι βαθμίδες εκπαίδευσης, Παιδικός Σταθμός, Νηπιαγωγείο, Δημοτικό, Γυμνάσιο, Λύκειο, στελεχώνονται από έμπειρους, καταρτισμένους εκπαιδευτικούς, που αγαπούν τη δουλειά τους και το παιδί. Με τον άρτιο συντονισμό των διδασκόντων, τη διαρκή επιμόρφωσή τους για τον εκσυγχρονισμό των διδακτικών μέσων και την καθημερινή  συνεργασία τους με μαθητές και γονείς, το μάθημα είναι πάντα δημιουργικό και ο ρυθμός δουλειάς αποδοτικός. Παράλληλα, οι πολύπλευρες καλλιτεχνικές και πνευματικές δραστηριότητες του, κάνουν το Εκπαιδευτήριο “ΤΟ ΠΑΓΚΡΗΤΙΟΝ”  να λειτουργεί σαν ένας ζωντανός πυρήνας για την Τέχνη και τον Πολιτισμό στην πόλη του Ηρακλείου.

            Πέρα από την εγρήγορση για υψηλού επιπέδου καθημερινή δουλειά και για επιτυχίες στα ανώτατα εκπαιδευτικά ιδρύματα, το Εκπαιδευτήριο σήμερα προσφέρει πολλά παραπάνω. Σε κάθε βαθμίδα αναπτύσσονται πολύπλευρες δραστηριότητες και λειτουργούν ποικίλοι κύκλοι ενδιαφερόντων για την ελεύθερη έκφραση της προσωπικότητας του μαθητή: σχολική ορχήστρα, θεατρική ομάδα, κύκλος εικαστικών και ζωγραφικής, κύκλος φωτογραφίας, κύκλος σχεδίασης ιστοσελίδων στο Διαδίκτυο, ομάδα περιβάλλοντος, ομάδα δημοσιογραφίας. Μέσα από τη δουλειά αυτών των κύκλων, οι μαθητές πάντα δημιουργούν. Όπως η ομάδα δημοσιογραφίας, που εδώ και 25 χρόνια, εκδίδει το ιστορικό πια περιοδικό "Έκφραση και Ενημέρωση" για τη ζωή και τη δραστηριότητα του σχολείου ή την μαθητική έκδοση "Μας πήραν είδηση". Παράλληλα, το Λύκειο εκδίδει τη δική του εφημερίδα με το όνομα "Νεανικές Φωνές", το Γυμνάσιο εκδίδει τη μηνιαία εφημερίδα "Μέρες Σχολέίου" που αποτυπώνει τη ζωή και τις δραστηριότητες της βαθμίδας, ενώ τα μικρά παιδιά του Δημοτικού την "Πένα", έκδοση που το Μάιο του 2010 απέσπασε το βραβείο Καλύτερης Εφημερίδας στον 17ο Πανελλήνιο Διαγωνισμό Μαθητικών Εντύπων της Εφημερίδας "ΤΑ ΝΕΑ".

            Δημιουργική δουλειά και μεγάλες επιτυχίες έχει δώσει και η θεατρική ομάδα του Παγκρητίου. Κορυφαίες στιγμές της, θεατρικές παραστάσεις που αγαπήθηκαν και βραβεύτηκαν σε πανελλήνιο επίπεδο, όπως ο "Ήλιος Ηλιάτορας" του Οδυσσέα Ελύτη, "Το τραγούδι του Νεκρού Αδερφού" και οι "Ελεύθεροι Πολιορκοιμένοι" του Διονυσίου Σολωμού.

            Σήμερα στο εκπαιδευτήριο λειτουργούν και πολλές απογευματινές, προαιρετικές δραστηριότητες:

            τμήματα απογευματινής μελέτης για παιδιά Δημοτικού
            μουσική σχολή με τμήματα κλασσικών, μοντέρνων και παραδοσιακών μουσικών σπουδών για παιδιά Δημοτικού και Γυμνασίου
            τμήματα για τα πιστοποιημένα διπλώματα πληροφορικής CAMBRIDGE και MOS
            απογευματινά προγράμματα Αγγλικών για μαθητές Γυμνασίου που θέλουν να οδηγηθούν  συντομότερα στα διπλώματα Cambridge FCE και κρατικό πιστοποιητικό γλωσσομάθειας',
            'background' => $background,
        ]);

        new Portal($pagkriteio, 5, 'school');

        Scholio::portalStudy($pagkriteio, 'Νηπιαγωγείο', 'Νήπια', 'Νήπια');
        Scholio::portalStudy($pagkriteio, 'Νηπιαγωγείο', 'Προνήπια', 'Προνήπια');

        Scholio::portalStudy($pagkriteio, 'Δημοτικό', 'Γενική Παιδεία', 'Ά Δημοτικού');
        Scholio::portalStudy($pagkriteio, 'Δημοτικό', 'Γενική Παιδεία', '΄Β Δημοτικού');
        Scholio::portalStudy($pagkriteio, 'Δημοτικό', 'Γενική Παιδεία', '΄Γ Δημοτικού');
        Scholio::portalStudy($pagkriteio, 'Δημοτικό', 'Γενική Παιδεία', '΄Δ Δημοτικού');
        Scholio::portalStudy($pagkriteio, 'Δημοτικό', 'Γενική Παιδεία', '΄Έ Δημοτικού');
        Scholio::portalStudy($pagkriteio, 'Δημοτικό', 'Γενική Παιδεία', 'ΣΤ Δημοτικού');

        Scholio::portalStudy($pagkriteio, 'Γυμνάσιο', 'Γενική Παιδεία', 'Ά Γυμνασίου');
        Scholio::portalStudy($pagkriteio, 'Γυμνάσιο', 'Γενική Παιδεία', '΄Β Γυμνασίου');
        Scholio::portalStudy($pagkriteio, 'Γυμνάσιο', 'Γενική Παιδεία', '΄Γ Γυμνασίου');
        Scholio::portalStudy($pagkriteio, 'Λύκειο', 'Γενική Παιδεία', 'Ά Λυκείου');
        Scholio::portalStudy($pagkriteio, 'Λύκειο', 'Γενική Παιδεία', '΄Β Λυκείου');
        Scholio::portalStudy($pagkriteio, 'Λύκειο', 'Γενική Παιδεία', '΄Γ Λυκείου');

        Scholio::portalSocial($pagkriteio, 'facebook', 'https://www.facebook.com/pagkritio');

        /*=============== cgs ok ================*/

        $cgs = factory(App\Models\School::class)->create([
            'user_id' => factory(App\User::class)->create(['name' => 'Εκπαιδευτήρια Κωστέα - Γείτονα CGS', 'email' => 'info@cgs.gr', 'password' => bcrypt('123456'), 'role' => 'school', 'username' => 'cgs'])->id,
            'address' => 'Παλλήνη Αττικής',
            'city' => 'Αθήνα',
            'phone' => 2106030411,
            'type_id' => 6,
            'website' => 'cgs.gr/',
            'approved' => 1,
            'about' => 'Τα Εκπαιδευτήρια Κωστέα-Γετονα, διανύοντας την πέμπτη δεκαετία τους ως ένας από τους σημαντικότερους εκπαιδευτικούς οργανισμούς στη χώρα μας, επαναπροσδιορίζονται ως CGS.
            Κρατάμε ακέραιες τις στέρεες βάσεις πάνω στις οποίες στηριχτήκαμε όλα αυτά τα χρόνια και προβάλλουμε τη δυναμική και αναπτυξιακή μας πορεία με τη νέα μας ταυτότητα. Το CGS παραμένει ένα ελληνικό σχολείο με διεθνή προοπτική, με στόχο να εκπαιδεύσει τους μελλοντικούς ενεργούς πολίτες του κόσμου.',
            'background' => $background,
        ]);

        new Portal($cgs, 5, 'school');

        Scholio::portalStudy($cgs, 'Νηπιαγωγείο', 'Νήπια', 'Νήπια');
        Scholio::portalStudy($cgs, 'Νηπιαγωγείο', 'Προνήπια', 'Προνήπια');

        Scholio::portalStudy($cgs, 'Δημοτικό', 'Γενική Παιδεία', 'Ά Δημοτικού');
        Scholio::portalStudy($cgs, 'Δημοτικό', 'Γενική Παιδεία', '΄Β Δημοτικού');
        Scholio::portalStudy($cgs, 'Δημοτικό', 'Γενική Παιδεία', '΄Γ Δημοτικού');
        Scholio::portalStudy($cgs, 'Δημοτικό', 'Γενική Παιδεία', '΄Δ Δημοτικού');
        Scholio::portalStudy($cgs, 'Δημοτικό', 'Γενική Παιδεία', '΄Έ Δημοτικού');
        Scholio::portalStudy($cgs, 'Δημοτικό', 'Γενική Παιδεία', 'ΣΤ Δημοτικού');

        Scholio::portalStudy($cgs, 'Γυμνάσιο', 'Γενική Παιδεία', 'Ά Γυμνασίου');
        Scholio::portalStudy($cgs, 'Γυμνάσιο', 'Γενική Παιδεία', '΄Β Γυμνασίου');
        Scholio::portalStudy($cgs, 'Γυμνάσιο', 'Γενική Παιδεία', '΄Γ Γυμνασίου');
        Scholio::portalStudy($cgs, 'Λύκειο', 'Γενική Παιδεία', 'Ά Λυκείου');
        Scholio::portalStudy($cgs, 'Λύκειο', 'Γενική Παιδεία', '΄Β Λυκείου');
        Scholio::portalStudy($cgs, 'Λύκειο', 'Γενική Παιδεία', '΄Γ Λυκείου');

        Scholio::portalSocial($cgs, 'facebook', 'https://www.facebook.com/cgs.gr/?pnref=lhc');
        Scholio::portalSocial($cgs, 'instagram', 'https://www.instagram.com/cgs_school/');
        Scholio::portalSocial($cgs, 'youtube', 'https://www.youtube.com/channel/UCn4pw8HK0w63l5dvFVK9UmA');
        Scholio::portalSocial($cgs, 'linkedin', 'https://www.linkedin.com/company/18204073/');




        /*=============== avgoulea ok ================*/


        $avgoulea = factory(App\Models\School::class)->create([
            'user_id' => factory(App\User::class)->create(['name' => 'Εκπαιδευτήρια Αυγουλέα - Λιναρδάτου', 'email' => 'info@avgouleaschool.gr', 'password' => bcrypt('123456'), 'role' => 'school', 'username' => 'avgoulea'])->id,
            'address' => 'Αρκαδίου 63 - 65 & Λυκούργου, 12132, Περιστέρι',
            'city' => 'Αθήνα',
            'phone' => 2115002300,
            'type_id' => 13,
            'website' => 'www.avgouleaschool.gr/',
            'approved' => 1,
            'about' => 'Σας καλωσορίζουμε στον δικτυακό τόπο των Εκπαιδευτηρίων Σ. Αυγουλέα - Λιναρδάτου. Βρίσκεστε σε ένα χώρο με υλικό και πληροφορίες για την εξηνταεφτάχρονη ιστορία της Σχολής μας, τις υλικοτεχνικές της υποδομές, τις κτιριακές της εγκαταστάσεις, τα πρότυπα ποιότητας που εφαρμόζει, τα εκπαιδευτικά προγράμματα που εκπονεί, τις καινοτόμες δράσεις που υλοποιεί, τις αθλητικές δραστηριότητες που προσφέρει, τις πολιτιστικές εκδηλώσεις που διοργανώνει, τις σχολικές εκδόσεις που διανέμει, το ικανό και έμπειρο εκπαιδευτικό δυναμικό που απασχολεί και τα εξαιρετικά αποτελέσματα των μαθητών της σε όλους τους τομείς.
                Περιηγούμενοι στον ιστοχώρο μας, θα γνωρίσετε την οργάνωση, δομή και λειτουργία του Παιδικού Σταθμού, του Νηπιαγωγείου, του Δημοτικού, του Γυμνασίου και του Λυκείου μας και θα ανακαλύψετε την εκπαιδευτική μας φιλοσοφία και τα παιδαγωγικά μας «πιστεύω».
                Η περιήγηση στον δικτυακό μας χώρο παρέχει σίγουρα πολλές κι ενδιαφέρουσες πληροφορίες, αλλά όχι όλες. Θα χαρούμε να έρθετε κοντά μας, να συζητήσουμε και να σας παρουσιάσουμε διά ζώσης το ολοκληρωμένο εκπαιδευτικό πρόγραμμα του Σχολείου μας και τη δυναμική, πολυεπίπεδη μόρφωση που μπορεί να προσφέρει στο παιδί σας.
                Ωστόσο, ως πρώτη επαφή και εφόσον το επιθυμείτε, μπορείτε να συμπληρώσετε τη φόρμα επικοινωνίας για να σας αποστείλουμε περισσότερες ή ειδικές πληροφορίες μέσω του ηλεκτρονικού ταχυδρομείου (e-mail).

                ',
            'background' => $background,
        ]);

        new Portal($avgoulea, 5, 'school');

        Scholio::portalStudy($avgoulea, 'Νηπιαγωγείο', 'Νήπια', 'Νήπια');
        Scholio::portalStudy($avgoulea, 'Νηπιαγωγείο', 'Προνήπια', 'Προνήπια');

        Scholio::portalStudy($avgoulea, 'Δημοτικό', 'Γενική Παιδεία', 'Ά Δημοτικού');
        Scholio::portalStudy($avgoulea, 'Δημοτικό', 'Γενική Παιδεία', '΄Β Δημοτικού');
        Scholio::portalStudy($avgoulea, 'Δημοτικό', 'Γενική Παιδεία', '΄Γ Δημοτικού');
        Scholio::portalStudy($avgoulea, 'Δημοτικό', 'Γενική Παιδεία', '΄Δ Δημοτικού');
        Scholio::portalStudy($avgoulea, 'Δημοτικό', 'Γενική Παιδεία', '΄Έ Δημοτικού');
        Scholio::portalStudy($avgoulea, 'Δημοτικό', 'Γενική Παιδεία', 'ΣΤ Δημοτικού');

        Scholio::portalStudy($avgoulea, 'Γυμνάσιο', 'Γενική Παιδεία', 'Ά Γυμνασίου');
        Scholio::portalStudy($avgoulea, 'Γυμνάσιο', 'Γενική Παιδεία', '΄Β Γυμνασίου');
        Scholio::portalStudy($avgoulea, 'Γυμνάσιο', 'Γενική Παιδεία', '΄Γ Γυμνασίου');
        Scholio::portalStudy($avgoulea, 'Λύκειο', 'Γενική Παιδεία', 'Ά Λυκείου');
        Scholio::portalStudy($avgoulea, 'Λύκειο', 'Γενική Παιδεία', '΄Β Λυκείου');
        Scholio::portalStudy($avgoulea, 'Λύκειο', 'Γενική Παιδεία', '΄Γ Λυκείου');

        Scholio::portalSocial($avgoulea, 'facebook', 'http://www.facebook.com/avgoulea.gr');
        Scholio::portalSocial($avgoulea, 'instagram', 'http://instagram.com/avgouleaschool?ref=badge');
        Scholio::portalSocial($avgoulea, 'youtube', 'http://youtube.com/avgouleaschool');




        /*=============== georgiouzwi ok ================*/

        $georgiouzwi = factory(App\Models\School::class)->create([
            'user_id' => factory(App\User::class)->create(['name' => 'Εκπαιδευτήρια Γεωργίου Ζώη', 'email' => ' info@zois-school.gr', 'password' => bcrypt('123456'), 'role' => 'school', 'username' => 'georgiouzwi'])->id,
            'address' => 'Αβέρωφ 12-14, 16452 Αργυρούπολη',
            'city' => 'Αθήνα',
            'phone' => 2109617817,
            'type_id' => 13,
            'website' => 'www.zois-school.gr/',
            'approved' => 1,
            'about' => 'Χαρτογραφώντας μέσα σε λίγες γραμμές την εκπαιδευτική φιλοσοφία των ΕΚΠΑΙΔΕΥΤΗΡΙΩΝ ΓΕΩΡΓΙΟΥ ΖΩΗ, επισημαίνουμε τα εξής:

            Βασική παιδαγωγική αρχή για τα Εκπαιδευτήριά μας είναι: τα πάντα για τους μαθητές μας, που μας χαρίζουν την ευτυχία «χωρίς ζύγι». Προσφορά αφειδώλευτη σ’ όλα τα παιδιά, γιατί στα μάτια όλων των παιδιών τρέχει ανόθευτο το αγίασμα που το λένε μέλλον, που το λένε φως, που το λένε ελπίδα.
            Καλό σχολείο για μας είναι το χαρούμενο σχολείο, το σχολείο στο οποίο τα παιδιά πηγαίνουν με χαρά και επιστρέφουν στο σπίτι με μεγαλύτερη χαρά. Το σχολείο στο οποίο η κάθε μέρα είναι γιορτή, γιορτή γνώσης, γιορτή σχολικής ζωής.
            Σύγχρονο σχολείο θεωρούμε το σχολείο που είναι απαλλαγμένο από άχρηστα, περιττά και αναχρονιστικά στοιχεία, που είναι ανοικτό στις ιδέες και στην κοινωνία, στη γνώση και στο μέλλον, και που αξιοποιεί κάθε σύγχρονο εργαλείο (διαδραστικό πίνακα, ψηφιακό εκπαιδευτικό υλικό) με το οποίο διευρύνονται οι ορίζοντες κάθε μαθητή και μαθήτριας, καταργούνται τα σύνορα της γνώσης και διευκολύνεται η επικοινωνία με τον εκπαιδευτικό.
            Ευθύνη των εκπαιδευτικών μας είναι να προσπαθούν καθημερινά για τη δημιουργία ενός πράσινου σχολείου, το οποίο καλλιεργεί στον μαθητή την περιβαλλοντική συνείδηση, προκειμένου να εξοικονομείται ενέργεια, να διατρέφεται υγιεινά και να σέβεται το περιβάλλον.
            Για μας η παιδεία είναι «ανθρωποποιία» (Μέγας Αντώνιος) και επιτυγχάνεται αν συνδέεται άρρηκτα με την παράδοσή μας, πυρήνας της οποίας είναι το ήθος της ορθοδοξίας.
            Θέλουμε τους εκπαιδευτικούς μας να είναι δάσκαλοι και λειτουργοί και όχι «παράγοντες» με υπαλληλική νοοτροπία, που περισσότερο διεκδικούν παρά διακονούν. Θέλουμε εκπαιδευτικούς που σέβονται την προσωπικότητα κάθε μαθητή, έχουν θετικές προσδοκίες για όλα τα παιδιά, καλή επικοινωνία μαζί τους, καθώς και μέτρο στη συμπεριφορά, διατηρώντας έτσι ισορροπία ανάμεσα στο χιούμορ και στην αυστηρότητα.
            Ρόλος ενός σύγχρονου εκπαιδευτικού οργανισμού είναι για μας να οδηγήσει τα παιδιά «να μάθουν πώς να μαθαίνουν» και πώς να προσαρμόζονται σ’ έναν κόσμο που μεταλλάσσεται ραγδαία, ώστε, διατηρώντας τον ελληνοκεντρικό του χαρακτήρα, να έχει παράλληλα το βλέμμα του στραμμένο στην Ευρώπη και στον κόσμο ολόκληρο, για να μπορέσει να εξοπλίσει γνωσιολογικά τον Έλληνα Ευρωπαίο, τον Έλληνα Πολίτη της Οικουμένης.
            Σωστό σχολείο θεωρούμε το σχολείο εκείνο που αξιοποιεί και τις κινητικές ικανότητες και κλίσεις όλων των μαθητών μέσα από αθλητικές δραστηριότητες, ώστε να αποκτούν συνήθειες οι οποίες αναβαθμίζουν την ποιότητα της ζωής τους. Στα ΕΚΠΑΙΔΕΥΤΗΡΙΑ ΓΕΩΡΓΙΟΥ ΖΩΗ έχουμε από νωρίς καταλάβει ότι η συμμετοχή στην άθληση σημαίνει συμμετοχή στη ζωή.
            «Εν κατακλείδι» για τα ΕΚΠΑΙΔΕΥΤΗΡΙΑ ΓΕΩΡΓΙΟΥ ΖΩΗ η παιδεία οφείλει κυρίως να δίνει σταθερά σημεία προσανατολισμού, δοκιμασμένες αξίες και καταξιωμένα ιδεώδη ως βάση του ζην, του συζήν και του ευζην.',
            'background' => $background,
        ]);

        new Portal($georgiouzwi, 5, 'school');

        Scholio::portalStudy($georgiouzwi, 'Νηπιαγωγείο', 'Νήπια', 'Νήπια');
        Scholio::portalStudy($georgiouzwi, 'Νηπιαγωγείο', 'Προνήπια', 'Προνήπια');

        Scholio::portalStudy($georgiouzwi, 'Δημοτικό', 'Γενική Παιδεία', 'Ά Δημοτικού');
        Scholio::portalStudy($georgiouzwi, 'Δημοτικό', 'Γενική Παιδεία', '΄Β Δημοτικού');
        Scholio::portalStudy($georgiouzwi, 'Δημοτικό', 'Γενική Παιδεία', '΄Γ Δημοτικού');
        Scholio::portalStudy($georgiouzwi, 'Δημοτικό', 'Γενική Παιδεία', '΄Δ Δημοτικού');
        Scholio::portalStudy($georgiouzwi, 'Δημοτικό', 'Γενική Παιδεία', '΄Έ Δημοτικού');
        Scholio::portalStudy($georgiouzwi, 'Δημοτικό', 'Γενική Παιδεία', 'ΣΤ Δημοτικού');

        Scholio::portalStudy($georgiouzwi, 'Γυμνάσιο', 'Γενική Παιδεία', 'Ά Γυμνασίου');
        Scholio::portalStudy($georgiouzwi, 'Γυμνάσιο', 'Γενική Παιδεία', '΄Β Γυμνασίου');
        Scholio::portalStudy($georgiouzwi, 'Γυμνάσιο', 'Γενική Παιδεία', '΄Γ Γυμνασίου');
        Scholio::portalStudy($georgiouzwi, 'Λύκειο', 'Γενική Παιδεία', 'Ά Λυκείου');
        Scholio::portalStudy($georgiouzwi, 'Λύκειο', 'Γενική Παιδεία', '΄Β Λυκείου');
        Scholio::portalStudy($georgiouzwi, 'Λύκειο', 'Γενική Παιδεία', '΄Γ Λυκείου');

        Scholio::portalSocial($georgiouzwi, 'facebook', 'http://www.facebook.com/pages/%CE%95%CE%BA%CF%80%CE%B1%CE%B9%CE%B4%CE%B5%CF%85%CF%84%CE%AE%CF%81%CE%B9%CE%B1-%CE%93%CE%B5%CF%89%CF%81%CE%B3%CE%AF%CE%BF%CF%85-%CE%96%CF%8E%CE%B7/199217543485682');
        Scholio::portalSocial($georgiouzwi, 'twitter', 'http://twitter.com/ZoisSchool');
        Scholio::portalSocial($georgiouzwi, 'youtube', 'http://www.youtube.com/user/zoisschool');




        /*=============== arsakeio ok ================*/

        $arsakeio = factory(App\Models\School::class)->create([
            'user_id' => factory(App\User::class)->create(['name' => 'Φιλεκπαιδευτική Εταιρεία Αερσάκεια - Τοσιτσεία Σχολεία', 'email' => 'info@arsakeio.gr', 'password' => bcrypt('123456'), 'role' => 'school', 'username' => 'arsakeio'])->id,
            'address' => 'Κοκκώνη 18 / Π. Ψυχικό 154 52',
            'city' => 'Αθήνα',
            'phone' => 2106755555,
            'type_id' => 13,
            'website' => 'www.arsakeio.gr/',
            'approved' => 1,
            'about' => 'Τα Αρσάκεια - Τοσίτσεια Σχολεία είναι συγκροτήματα σχολικών μονάδων πρωτοβάθμιας και δευτεροβάθμιας εκπαίδευσης, τα οποία ανήκουν στην Φιλεκπαιδευτική Εταιρεία (ΦΕ). Εδρεύουν στην Αθήνα, Παλαιό Ψυχικό και Εκάλη, Πάτρα, Θεσσαλονίκη, Ιωάννινα και Τίρανα (Αλβανία).',
            'background' => $background,
        ]);

        new Portal($arsakeio, 5, 'school');

        Scholio::portalStudy($arsakeio, 'Νηπιαγωγείο', 'Νήπια', 'Νήπια');
        Scholio::portalStudy($arsakeio, 'Νηπιαγωγείο', 'Προνήπια', 'Προνήπια');

        Scholio::portalStudy($arsakeio, 'Δημοτικό', 'Γενική Παιδεία', 'Ά Δημοτικού');
        Scholio::portalStudy($arsakeio, 'Δημοτικό', 'Γενική Παιδεία', '΄Β Δημοτικού');
        Scholio::portalStudy($arsakeio, 'Δημοτικό', 'Γενική Παιδεία', '΄Γ Δημοτικού');
        Scholio::portalStudy($arsakeio, 'Δημοτικό', 'Γενική Παιδεία', '΄Δ Δημοτικού');
        Scholio::portalStudy($arsakeio, 'Δημοτικό', 'Γενική Παιδεία', '΄Έ Δημοτικού');
        Scholio::portalStudy($arsakeio, 'Δημοτικό', 'Γενική Παιδεία', 'ΣΤ Δημοτικού');

        Scholio::portalStudy($arsakeio, 'Γυμνάσιο', 'Γενική Παιδεία', 'Ά Γυμνασίου');
        Scholio::portalStudy($arsakeio, 'Γυμνάσιο', 'Γενική Παιδεία', '΄Β Γυμνασίου');
        Scholio::portalStudy($arsakeio, 'Γυμνάσιο', 'Γενική Παιδεία', '΄Γ Γυμνασίου');
        Scholio::portalStudy($arsakeio, 'Λύκειο', 'Γενική Παιδεία', 'Ά Λυκείου');
        Scholio::portalStudy($arsakeio, 'Λύκειο', 'Γενική Παιδεία', '΄Β Λυκείου');
        Scholio::portalStudy($arsakeio, 'Λύκειο', 'Γενική Παιδεία', '΄Γ Λυκείου');

        Scholio::portalSocial($arsakeio, 'facebook', 'https://www.facebook.com/ArsakeioClasiko/');
        
    }
}
