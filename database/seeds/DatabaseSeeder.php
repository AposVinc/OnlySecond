<?php

use App\Address;
use App\Admin;
use App\Banner;
use App\Specification;
use App\Category;
use App\Color;
use App\Courier;
use App\Image;
use App\Offer;
use App\OrderHistory;
use App\Payment;
use App\Review;
use App\Supplier;
use App\User;
use App\Brand;
use App\Collection;
use App\Product;
use App\Newsletter;
use App\Cart;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class
DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   // $this->call(UsersTableSeeder::class);

        ////////////////////////////////////////////////////////////////////
        /*---   PAGES   --------------------------------------------------*/
        ////////////////////////////////////////////////////////////////////

        DB::table('pages')->insert(
            [
                'about' => 1,
                'ab_path_img_storia' => 'storage/Page/main-photo.jpg',
                'ab_desc_storia' => 'OnlySecond è specializzato nella vendita online di orologi. Trovare consigli su un orologio, poter confrontare differenti orologi, ordinare subito, trovare un cinturino di ricambio per il tuo orologio: tutto è possibile su OnlySecond! OnlySecond lo specialista degli orologi.',
                'ab_why_tit_1'=>'Lo specialista degli orologi',
                'ab_why_txt_1'=>'Grazie alle opportunità offerte dalla Rete Internet, siamo in grado di occuparci della vendita delle più conosciute marche di orologi. Siamo costantemente alla ricerca di nuove occasioni per sorprendervi.',
                'ab_why_tit_2'=>'Sicurezza',
                'ab_why_txt_2'=>'OS è membro di E-commerce Europe ed offre un metodo di acquisto affidabile e sicuro. Pagare il tuo ordine è facile coni nostri metodi di pagamento, come Carta di Credito e PayPal.',
                'ab_why_tit_3'=>'Resi gratuiti',
                'ab_why_txt_3'=>'Restituisci gratuitamente il pacco a OnlySecond con il nostro Servizio Resi gratuito alla tua sede locale per il ritiro. Non paghi nulla per il reso del tuo pacco!',
                'ab_why_tit_4'=>'Garanzia restituzione del denaro!',
                'ab_why_txt_4'=>'Con HWG hai 30 giorni di tempo per cambiare idea. Non sei completamente soddisfatto del tuo acquisto? Restituisci il prodotto e riceverai indietro l\'importo dell\'acquisto una volta che il pacco sarà arrivato alla nostra sede.',
                'ab_why_tit_5'=>'Spedizione gratuita',
                'ab_why_txt_5'=>'Hai fatto la tua scelta nella nostra grande gamma? Qualsiasi ordine sopra i 250€ sarà spedito gratuitamente. Cosa aspetti?',
                'ab_why_tit_6'=>'Un anno di garanzia extra!',
                'ab_why_txt_6'=>'Oltre garanzia internazionale della durata due anni obbligatoria per legge, avrai un altro anno di garanzia!',
                'ab_team_path_1'=>'storage/Page/first-member-photo.jpg',
                'ab_team_name_1'=>'Sara Di Berardino',
                'ab_team_desc_1'=>'Descrizione',
                'ab_team_path_2'=>'storage/Page/second-member-photo.jpg',
                'ab_team_name_2'=>'Vincenzo Apostolo',
                'ab_team_desc_2'=>'Descrizione',
                'ab_team_path_3'=>'storage/Page/third-member-photo.jpg',
                'ab_team_name_3'=>'Valentina Rampa',
                'ab_team_desc_3'=>'Descrizione'
            ]
        );

        DB::table('pages')->insert(
            [
                'contactus' => 1,
                'cus_tel_1' => '0861254897',
                'cus_tel_2' => '3339568744',
                'cus_email_contatti' => 'info@onlysecond.com',
                'cus_email_aiuto' => 'help@onlysecond.com',
                'cus_indirizzo' => 'Via Vetoio, 67100 L\'Aquila AQ'
            ]
        );


        ////////////////////////////////////////////////////////////////////
        /*---   BE   -----------------------------------------------------*/
        ////////////////////////////////////////////////////////////////////

        /*---   PERMESSI PER RUOLO   -----------------------------------------------------*/

        Permission::create(['guard_name' => 'admin','name'=>'gest_utenti']);
        Permission::create(['guard_name' => 'admin','name'=>'gest_sito']);
        Permission::create(['guard_name' => 'admin','name'=>'gest_prodotti']);
        Permission::create(['guard_name' => 'admin','name'=>'gest_offerte']);
        Permission::create(['guard_name' => 'admin','name'=>'gest_banner']);
        Permission::create(['guard_name' => 'admin','name'=>'gest_imgprod']);
        Permission::create(['guard_name' => 'admin','name'=>'gest_fornitori']);
        Permission::create(['guard_name' => 'admin','name'=>'gest_newsletter']);
        Permission::create(['guard_name' => 'admin','name'=>'gest_assistenza']);

        /*---   RUOLI ADMIN   -----------------------------------------------------*/

        $admin = Role::create(['guard_name' => 'admin','name' => 'Admin'])->givePermissionTo(Permission::all());
        $manager = Role::create(['guard_name' => 'admin','name' => 'Manager'])->givePermissionTo(['gest_prodotti','gest_sito','gest_offerte',
                                                                            'gest_banner','gest_imgprod','gest_fornitori','gest_newsletter']);
        $designer = Role::create(['guard_name' => 'admin','name' => 'Designer'])->givePermissionTo(['gest_banner','gest_imgprod']);
        $pubblicitario = Role::create(['guard_name' => 'admin','name'=>'Pubblicitario'])->givePermissionTo(['gest_offerte','gest_banner','gest_newsletter']);
        $assistenza = Role::create(['guard_name' => 'admin','name'=>'Assistenza Clienti'])->givePermissionTo(['gest_assistenza']);

        /*---   ADMIN   -----------------------------------------------------*/

        $admin1 = new Admin(['name'=>'a', 'email'=>'a@a.it', 'password'=>'aaaaaaaa']);
        $admin1->assignRole($admin)->save();

        $admin2 = new Admin(['name'=>'b', 'email'=>'b@b.it', 'password'=>'bbbbbbbb']);
        $admin2->assignRole($pubblicitario)->save();

        $admin3 = new Admin(['name'=>'c', 'email'=>'c@c.it', 'password'=>'cccccccc']);
        $admin3->assignRole($assistenza)->save();

        /*---   CATEGORIE   -----------------------------------------------------*/

        $smart = new Category(['name' => 'Smart']);                         $smart->save();
        $water_resistence = new Category(['name' => 'Water Resistence']);   $water_resistence->save();
        $classic = new Category(['name' => 'Classic']);                     $classic->save();
        $digital = new Category(['name' => 'Digital']);                     $digital->save();
        $sport = new Category(['name' => 'Sport']);                         $sport->save();

        /*---   COLORI   -----------------------------------------------------*/

        $argento = new Color(['name'=>'Argento' , 'hex' => '#c0c0c0']);         $argento->save();
        $oro = new Color(['name'=>'Oro' , 'hex' => '#daa520']);                 $oro->save();
        $bianco = new Color(['name'=>'Bianco' , 'hex' => '#ffffff']);           $bianco->save();
        $nero = new Color(['name'=>'Nero' , 'hex' => '#000000']);               $nero->save();
        $grigio = new Color(['name'=>'Grigio' , 'hex' => '#808080']);           $grigio->save();
        $rosa = new Color(['name'=>'Rosa' , 'hex' => '#ff99cc']);               $rosa->save();
        $blu = new Color(['name'=>'Blu' , 'hex' => '#0033cc']);                 $blu->save();
        $verde = new Color(['name'=>'Verde' , 'hex' => '#15a813']) ;            $verde->save();
        $marrone = new Color(['name'=>'Marrone' , 'hex' => '#8B4513']);         $marrone->save();
        $oro_rosa = new Color(['name'=>'Oro Rosa', 'hex' => '#ffd9b3']);        $oro_rosa->save();
        $viola = new Color(['name'=>'Viola', 'hex' => '#8f246b']);              $viola->save();
        $arancione= new Color(['name'=> 'Arancione', 'hex'=> '#ff6600']);       $arancione->save();
        $rosso_rubino=new Color(['name'=>'Rosso Rubino', 'hex'=> '#d01635']);   $rosso_rubino->save();

        /*---   FORNITORI   -----------------------------------------------------*/

        $fornitore1 = new Supplier(['name'=>'fornitore1','email'=>'fornitore1@fornitore.it','phone'=>'1231231231','city'=>'Roma','address'=>'via Milano','zip'=>'00001','iban'=>'123123123123123']);
        $fornitore1->save();
        $fornitore2 = new Supplier(['name'=>'fornitore2','email'=>'fornitore2@fornitore.it','phone'=>'1231231232','city'=>'Milano','address'=>'via Roma','zip'=>'00002','iban'=>'123123123123124']);
        $fornitore2->save();

        /*---   PRODOTTI   -----------------------------------------------------*/

        /* Breil */
        $Breil = new Brand(['name' => 'Breil', 'path_logo' => 'storage/Logo/Logo_Breil.png']);
        $Breil->save();

        /* Collezioni Breil */
        $Six_3_Nine= new Collection(['name'=> 'Six 3 Nine']);
        $Breil->collections()->save($Six_3_Nine);

        /* Prodotti Breil */
        $Six_3_Nine_P1 = new Product(['cod' => 'BS3N01','price' => '220', 'stock_availability' => '13',
            'genre' => 'U','long_desc' => 'Questo orologio Breil ha una cassa in colore ricoperto acciaio inossidabile con un diametro di 44 mm ed è dotato di un cinturino in Metallo. All\'interno ha un movimento Cronografo al quarzo per orologi di qualità ed è finito con un vetro di tipo Hardlex Crystal.
            L\'orologio è impermeabile a 5ATM. Questo significa che l\'orologio è adatto per uso sotto doccia.
            L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.','quantity_sold' => 2]);
        $Six_3_Nine_P1I1 = new Image(['path_image' => 'storage/Orologi/Breil/Six 3 Nine/Breil_Six_3_Nine_1.png', 'main' => '1']);
        $Six_3_Nine_P1I2 = new Image(['path_image' => 'storage/Orologi/Breil/Six 3 Nine/Breil_Six_3_Nine_2.png', 'main' => '0']);
        $Six_3_Nine_P1->collection_id = $Breil->id;
        $Six_3_Nine_P1->supplier_id = $fornitore1->id;
        $Six_3_Nine_P1->color_id = $nero->id;
        $Six_3_Nine_P1->save();
        $Six_3_Nine_P1S = new Specification(['case_size' => '44mm', 'material' => 'Inox Colorato', 'case_thickness' => '10mm', 'glass' => 'Hardlex Crystal', 'strap_material' => 'Metallo', 'closing' => 'Milanese Clasp', 'movement' => 'Cronografo', 'warranty' => '2 anni']);
        $Six_3_Nine_P1S->dial_color = $nero->id;
        $Six_3_Nine_P1S->strap_color = $nero->id;
        $Six_3_Nine_P1->categories()->save($classic);
        $Six_3_Nine_P1->images()->save($Six_3_Nine_P1I1);
        $Six_3_Nine_P1->images()->save($Six_3_Nine_P1I2);
        $Six_3_Nine_P1->specification()->save($Six_3_Nine_P1S);
        $Six_3_Nine->products()->save($Six_3_Nine_P1);



        /* Diesel */
        $Diesel = new Brand(['name' => 'Diesel','path_logo' => 'storage/Logo/Logo_Diesel.png']);
        $Diesel->save();

        /* Collezioni Diesel */
        $Double_Down_P44 = new Collection(['name' => 'Double Down P44']);
        $Diesel->collections()->save($Double_Down_P44);

        /* Prodotti Diesel */
        $Double_Down_P44P1 = new Product(['cod' => 'DZ1436','price' => '89', 'stock_availability' => '10',
            'genre' => 'U','long_desc' => 'Orologio Di Diesel Da Unisex Della Collezione Double Down 44. Questo Modello Ha Cassa Della Dimensione Di 52 X 44 Mm Ed È Realizzata In Policarbonato Con Finitura Opaca Di Colore Nero E Di Forma Rotonda, 
            Con Spessore Di 14Mm. Il Vetro Di Questo Modello È Trasparente E Il Quadrante È Di Colore Nero. 
            La Ghiera Di Questo Modello Di Orologio È In Nylon Con Finitura Lucida Di Colore Nero. 
            Le Anse Hanno Distanza Di 24Mm E Il Cinturino È Realizzato In Silicone Con Finitura Opaca Ed È Di Colore Nero. Questo Modello È Di Tipo Quarzo / 3 Sfere Ed Ha Una Resistenza All\'Acqua Di 5 Atm.','quantity_sold' => 2]);
        $Double_Down_P44P1I1 = new Image(['path_image' => 'storage/Orologi/Diesel/Double Down P44/Diesel_Double Down P44_DZ1436_Nero.png', 'main' => '1']);
        $Double_Down_P44P1I2 = new Image(['path_image' => 'storage/Orologi/Diesel/Double Down P44/Diesel_Double Down P44_DZ1436_Nero_1.png', 'main' => '0']);
        $Double_Down_P44P1I3 = new Image(['path_image' => 'storage/Orologi/Diesel/Double Down P44/Diesel_Double Down P44_DZ1436_Nero_2.png', 'main' => '0']);
        $Double_Down_P44P1->collection_id = $Diesel->id;
        $Double_Down_P44P1->supplier_id = $fornitore2->id;
        $Double_Down_P44P1->color_id = $nero->id;
        $Double_Down_P44P1->save();
        $Double_Down_P4S = new Specification(['case_size' => '47mm', 'material' => 'Inox Colorato', 'case_thickness' => '13mm', 'glass' => 'Amoled', 'strap_material' => 'Silicone', 'closing' => 'Fibbia', 'movement' => 'Digitale Smart', 'warranty' => '1 anno']);
        $Double_Down_P4S->dial_color = $nero->id;
        $Double_Down_P4S->strap_color = $nero->id;
        $Double_Down_P44P1->categories()->save($classic);
        $Double_Down_P44P1->categories()->save($water_resistence);
        $Double_Down_P44P1->images()->save($Double_Down_P44P1I1);
        $Double_Down_P44P1->images()->save($Double_Down_P44P1I2);
        $Double_Down_P44P1->images()->save($Double_Down_P44P1I3);
        $Double_Down_P44P1->specification()->save($Double_Down_P4S);
        $Double_Down_P44->products()->save($Double_Down_P44P1);



        /* Fossil */
        $Fossil = new Brand(['name' => 'Fossil','path_logo' => 'storage/Logo/Logo_Fossil.png']);
        $Fossil->save();

        /* Collezioni Fossil */
        $Carlie = new Collection(['name' => 'Carlie']);
        $Fossil->collections()->save($Carlie);

        $Sport = new Collection(['name' => 'Sport']);
        $Fossil->collections()->save($Sport);

        $Q_Explorist = new Collection(['name' => 'Q Explorist']);
        $Fossil->collections()->save($Q_Explorist);

        /* Prodotti Fossil */
        $CarlieP1 = new Product(['cod' => 'ES4432','price' => '109', 'stock_availability' => '24',
            'genre' => 'F','long_desc' => 'Questo orologio Fossil ha una cassa in acciaio inox con un diametro di 29 mm ed è dotato di un cinturino in Metallo. All\'interno ha un movimento quarzo per orologi di qualità ed è finito con un vetro di tipo minerale.
            L\'orologio è impermeabile a 5ATM. Questo significa che l\'orologio è adatto per uso sotto doccia. 
            L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.','quantity_sold' => 5]);
        $CarlieP1I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Carlie/Fossil_Carlie_ES4432_Argento.png', 'main' => '1']);
        $CarlieP1S = new Specification(['case_size' => '28mm', 'material' => 'Acciaio Inossidabile', 'case_thickness' => '7mm', 'glass' => 'Minerale', 'strap_material' => 'Acciaio', 'closing' => 'Chiusura Di Sicurezza', 'movement' => 'Quarzo', 'warranty' => '1 anno']);
        $CarlieP1S->dial_color = $argento->id;
        $CarlieP1S->strap_color = $argento->id;
        $CarlieP1->collection_id = $Carlie->id;
        $CarlieP1->supplier_id = $fornitore1->id;
        $CarlieP1->color_id = $argento->id;
        $CarlieP1->save();
        $CarlieP1->categories()->save($classic);
        $CarlieP1->images()->save($CarlieP1I1);
        $CarlieP1->specification()->save($CarlieP1S);
        $Carlie->products()->save($CarlieP1);

        $CarlieP2 = new Product(['cod' => 'ES4433','price' => '109', 'stock_availability' => '5',
            'genre' => 'F','long_desc' => 'Questo orologio Fossil ha una cassa in acciaio inox oro rosa con un diametro di 29 mm ed è dotato di un cinturino in Metallo. All\'interno ha un movimento quarzo per orologi di qualità ed è finito con un vetro di tipo minerale.
            L\'orologio è impermeabile a 5ATM. Questo significa che l\'orologio è adatto per uso sotto doccia. 
            L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.','quantity_sold' => 1]);
        $CarlieP2I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Carlie/Fossil_Carlie_ES4433_Rosa.png', 'main' => '1']);
        $CarlieP2S = new Specification(['case_size' => '28mm', 'material' => 'Acciaio Inossidabile', 'case_thickness' => '7mm', 'glass' => 'Minerale', 'strap_material' => 'Acciaio', 'closing' => 'Chiusura Di Sicurezza', 'movement' => 'Quarzo', 'warranty' => '2 anni']);
        $CarlieP2S->dial_color = $rosa->id;
        $CarlieP2S->strap_color = $rosa->id;
        $CarlieP2->collection_id = $Carlie->id;
        $CarlieP2->supplier_id = $fornitore1->id;
        $CarlieP2->color_id = $rosa->id;
        $CarlieP2->save();
        $CarlieP2->categories()->save($classic);
        $CarlieP2->images()->save($CarlieP2I1);
        $CarlieP2->specification()->save($CarlieP2S);
        $Carlie->products()->save($CarlieP2);

        $CarlieP3 = new Product(['cod' => 'ES4488','price' => '109', 'stock_availability' => '5',
            'genre' => 'F','long_desc' => 'Questo orologio Fossil ha una cassa in acciaio inox nero con un diametro di 28 mm ed è dotato di un cinturino in Acciaio. All\'interno ha un movimento quarzo per orologi di qualità ed è finito con un vetro di tipo minerale.
            L\'orologio è impermeabile a 5ATM. Questo significa che l\'orologio è adatto per uso sotto doccia. 
            L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.','quantity_sold' => 1]);
        $CarlieP3I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Carlie/Fossil_Carlie_ES4488_Nero.png', 'main' => '1']);
        $CarlieP3I2 = new Image(['path_image' => 'storage/Orologi/Fossil/Carlie/Fossil_Carlie_ES4488_Nero_1.png', 'main' => '0']);
        $CarlieP3I3 = new Image(['path_image' => 'storage/Orologi/Fossil/Carlie/Fossil_Carlie_ES4488_Nero_2.png', 'main' => '0']);
        $CarlieP3S = new Specification(['case_size' => '28mm', 'material' => 'Acciaio Inossidabile', 'case_thickness' => '7mm', 'glass' => 'Minerale', 'strap_material' => 'Acciaio', 'closing' => 'Chiusura Di Sicurezza', 'movement' => 'Quarzo', 'warranty' => '2 anni']);
        $CarlieP3S->dial_color = $nero->id;
        $CarlieP3S->strap_color = $nero->id;
        $CarlieP3->collection_id = $Carlie->id;
        $CarlieP3->supplier_id = $fornitore1->id;
        $CarlieP3->color_id = $nero->id;
        $CarlieP3->save();
        $CarlieP3->categories()->save($classic);
        $CarlieP3->images()->save($CarlieP3I1);
        $CarlieP3->images()->save($CarlieP3I2);
        $CarlieP3->images()->save($CarlieP3I3);
        $CarlieP3->specification()->save($CarlieP3S);
        $Carlie->products()->save($CarlieP3);

        $SportP1 = new Product(['cod' => 'FT6024','price' => '249', 'stock_availability' => '12',
            'genre' => 'U','long_desc' => 'Smartwatch sportivo da nuoto con tracker fitness integrato e cinturino intercambiabile.','quantity_sold' => 1]);
        $SportP1I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Sport/Fossil_Sport_FT6024_Nero.png', 'main' => '1']);
        $SportP1I2 = new Image(['path_image' => 'storage/Orologi/Fossil/Sport/Fossil_Sport_FT6024_Nero_1.png', 'main' => '0']);
        $SportP1I3 = new Image(['path_image' => 'storage/Orologi/Fossil/Sport/Fossil_Sport_FT6024_Nero_2.png', 'main' => '0']);
        $SportP1S = new Specification(['case_size' => '41mm', 'material' => 'Alluminio', 'case_thickness' => '12mm', 'glass' => 'Minerale', 'strap_material' => 'Silicone', 'closing' => 'Fibbie', 'movement' => '', 'warranty' => '1 anno']);
        $SportP1S->dial_color = $nero->id;
        $SportP1S->strap_color = $nero->id;
        $SportP1->collection_id = $Sport->id;
        $SportP1->supplier_id = $fornitore1->id;
        $SportP1->color_id = $nero->id;
        $SportP1->save();
        $SportP1->categories()->save($smart);
        $SportP1->categories()->save($water_resistence);
        $SportP1->categories()->save($sport);
        $SportP1->images()->save($SportP1I1);
        $SportP1->images()->save($SportP1I2);
        $SportP1->images()->save($SportP1I3);
        $SportP1->specification()->save($SportP1S);
        $Sport->products()->save($SportP1);

        $SportP2 = new Product(['cod' => 'FT6028','price' => '249', 'stock_availability' => '2',
            'genre' => 'F','long_desc' => 'Smartwatch sportivo da nuoto con tracker fitness integrato e cinturino intercambiabile.']);
        $SportP2I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Sport/Fossil_Sport_FT6028_Rosa.png', 'main' => '1']);
        $SportP2I2 = new Image(['path_image' => 'storage/Orologi/Fossil/Sport/Fossil_Sport_FT6028_Rosa_1.png', 'main' => '0']);
        $SportP2I3 = new Image(['path_image' => 'storage/Orologi/Fossil/Sport/Fossil_Sport_FT6028_Rosa_2.png', 'main' => '0']);
        $SportP2S = new Specification(['case_size' => '41mm', 'material' => 'Alluminio', 'case_thickness' => '12mm', 'glass' => 'Minerale', 'strap_material' => 'Silicone', 'closing' => 'Fibbie', 'movement' => '', 'warranty' => '1 anno']);
        $SportP2S->dial_color = $rosa->id;
        $SportP2S->strap_color = $rosa->id;
        $SportP2->collection_id = $Sport->id;
        $SportP2->supplier_id = $fornitore1->id;
        $SportP2->color_id = $rosa->id;
        $SportP2->save();
        $SportP2->categories()->save($smart);
        $SportP2->categories()->save($water_resistence);
        $SportP2->categories()->save($sport);
        $SportP2->images()->save($SportP2I1);
        $SportP2->images()->save($SportP2I2);
        $SportP2->images()->save($SportP2I3);
        $SportP2->specification()->save($SportP2S);
        $Sport->products()->save($SportP2);

        $Q_ExploristP1 = new Product(['cod' => 'FT4012','price' => '239', 'stock_availability' => '16',
            'genre' => 'U','long_desc' => 'Questo smartwatch generazione 4 Fossil è un\'aggiunta intelligente alla tua vita quotidiana! 
            Tramite Bluetooth è possibile connettere facilmente lo smartwatch con gli smartphone Android ™ o iOS®. 
            Usando il sistema operativo \'Wear OS by Google ™\' liscio e riceverai notifiche da tutte le tue app preferite e beneficerai di innumerevoli funzioni come:
            ✓ cardiofrequenzimetro
            ✓ GPS
            ✓ Scegli la tua interfaccia preferita
            ✓ Contapassi
            ✓ Impermeabile pe ril nuoto 
            e molto altro..
            Con un utilizzo medio devi caricare il tuo smartwatch dopo circa un giorno, ma questo non è affatto un problema.
            Questo smartwatch ricarica fino all\'80% entro 1 ora. Questo smartwatch di questa generazione 4 è inoltre dotato di un chip NFC per, tra gli altri, Google Pay. 
            Scegli smart e fashion. Scegli lo smartwatch Fossil.']);
        $Q_ExploristP1I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Q Explorist/Fossil_Q Explorist_FT4012_Grigio.png', 'main' => '1']);
        $Q_ExploristP1I2 = new Image(['path_image' => 'storage/Orologi/Fossil/Q Explorist/Fossil_Q Explorist_FT4012_Grigio_1.png', 'main' => '0']);
        $Q_ExploristP1I3 = new Image(['path_image' => 'storage/Orologi/Fossil/Q Explorist/Fossil_Q Explorist_FT4012_Grigio_2.png', 'main' => '0']);
        $Q_ExploristP1S = new Specification(['case_size' => '45mm', 'material' => 'Inox Colorato', 'case_thickness' => '12.5mm', 'glass' => 'Amoled', 'strap_material' => 'Silicone', 'closing' => 'Fibbie', 'movement' => 'Digitale smart', 'warranty' => '1 anno']);
        $Q_ExploristP1S->dial_color = $grigio->id;
        $Q_ExploristP1S->strap_color = $grigio->id;
        $Q_ExploristP1->collection_id = $Q_Explorist->id;
        $Q_ExploristP1->supplier_id = $fornitore1->id;
        $Q_ExploristP1->color_id = $grigio->id;
        $Q_ExploristP1->save();
        $Q_ExploristP1->categories()->save($smart);
        $Q_ExploristP1->categories()->save($water_resistence);
        $Q_ExploristP1->categories()->save($sport);
        $Q_ExploristP1->images()->save($Q_ExploristP1I1);
        $Q_ExploristP1->images()->save($Q_ExploristP1I2);
        $Q_ExploristP1->images()->save($Q_ExploristP1I3);
        $Q_ExploristP1->specification()->save($Q_ExploristP1S);
        $Q_Explorist->products()->save($Q_ExploristP1);

        $Q_ExploristP2 = new Product(['cod' => 'FT4015','price' => '239', 'stock_availability' => '4',
            'genre' => 'U','long_desc' => 'Questo smartwatch generazione 4 Fossil è un\'aggiunta intelligente alla tua vita quotidiana! 
            Tramite Bluetooth è possibile connettere facilmente lo smartwatch con gli smartphone Android ™ o iOS®. 
            Usando il sistema operativo \'Wear OS by Google ™\' liscio e riceverai notifiche da tutte le tue app preferite e beneficerai di innumerevoli funzioni come:
            ✓ cardiofrequenzimetro
            ✓ GPS
            ✓ Scegli la tua interfaccia preferita
            ✓ Contapassi
            ✓ Impermeabile pe ril nuoto 
            e molto altro..
            Con un utilizzo medio devi caricare il tuo smartwatch dopo circa un giorno, ma questo non è affatto un problema.
            Questo smartwatch ricarica fino all\'80% entro 1 ora. Questo smartwatch di questa generazione 4 è inoltre dotato di un chip NFC per, tra gli altri, Google Pay. 
            Scegli smart e fashion. Scegli lo smartwatch Fossil.','quantity_sold' => 1]);
        $Q_ExploristP2I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Q Explorist/Fossil_Q Explorist_FT4015_Marrone.png', 'main' => '1']);
        $Q_ExploristP2S = new Specification(['case_size' => '45mm', 'material' => 'Inox Colorato', 'case_thickness' => '12.5mm', 'glass' => 'Amoled', 'strap_material' => 'Silicone', 'closing' => 'Fibbie', 'movement' => 'Digitale smart', 'warranty' => '1 anno']);
        $Q_ExploristP2S->dial_color = $marrone->id;
        $Q_ExploristP2S->strap_color = $marrone->id;
        $Q_ExploristP2->collection_id = $Q_Explorist->id;
        $Q_ExploristP2->supplier_id = $fornitore1->id;
        $Q_ExploristP2->color_id = $marrone->id;
        $Q_ExploristP2->save();
        $Q_ExploristP2->categories()->save($smart);
        $Q_ExploristP2->categories()->save($water_resistence);
        $Q_ExploristP2->categories()->save($sport);
        $Q_ExploristP2->images()->save($Q_ExploristP2I1);
        $Q_ExploristP2->specification()->save($Q_ExploristP2S);
        $Q_Explorist->products()->save($Q_ExploristP2);

        $Q_ExploristP3 = new Product(['cod' => 'FT4016','price' => '239', 'stock_availability' => '5',
            'genre' => 'U','long_desc' => 'Questo smartwatch generazione 4 Fossil è un\'aggiunta intelligente alla tua vita quotidiana! 
            Tramite Bluetooth è possibile connettere facilmente lo smartwatch con gli smartphone Android ™ o iOS®. 
            Usando il sistema operativo \'Wear OS by Google ™\' liscio e riceverai notifiche da tutte le tue app preferite e beneficerai di innumerevoli funzioni come:
            ✓ cardiofrequenzimetro
            ✓ GPS
            ✓ Scegli la tua interfaccia preferita
            ✓ Contapassi
            ✓ Impermeabile pe ril nuoto 
            e molto altro..
            Con un utilizzo medio devi caricare il tuo smartwatch dopo circa un giorno, ma questo non è affatto un problema.
            Questo smartwatch ricarica fino all\'80% entro 1 ora. Questo smartwatch di questa generazione 4 è inoltre dotato di un chip NFC per, tra gli altri, Google Pay. 
            Scegli smart e fashion. Scegli lo smartwatch Fossil.']);
        $Q_ExploristP3I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Q Explorist/Fossil_Q Explorist_FT4016_Nero.png', 'main' => '1']);
        $Q_ExploristP3S = new Specification(['case_size' => '45mm', 'material' => 'Inox Colorato', 'case_thickness' => '12.5mm', 'glass' => 'Amoled', 'strap_material' => 'Silicone', 'closing' => 'Fibbie', 'movement' => 'Digitale smart', 'warranty' => '1 anno']);
        $Q_ExploristP3S->dial_color = $nero->id;
        $Q_ExploristP3S->strap_color = $nero->id;
        $Q_ExploristP3->collection_id = $Q_Explorist->id;
        $Q_ExploristP3->supplier_id = $fornitore1->id;
        $Q_ExploristP3->color_id = $nero->id;
        $Q_ExploristP3->save();
        $Q_ExploristP3->categories()->save($smart);
        $Q_ExploristP3->categories()->save($water_resistence);
        $Q_ExploristP3->categories()->save($sport);
        $Q_ExploristP3->images()->save($Q_ExploristP3I1);
        $Q_ExploristP3->specification()->save($Q_ExploristP3S);
        $Q_Explorist->products()->save($Q_ExploristP3);

        $Q_ExploristP4 = new Product(['cod' => 'FT4019','price' => '239', 'stock_availability' => '6',
            'genre' => 'U','long_desc' => 'Questo smartwatch generazione 4 Fossil è un\'aggiunta intelligente alla tua vita quotidiana! 
            Tramite Bluetooth è possibile connettere facilmente lo smartwatch con gli smartphone Android ™ o iOS®. 
            Usando il sistema operativo \'Wear OS by Google ™\' liscio e riceverai notifiche da tutte le tue app preferite e beneficerai di innumerevoli funzioni come:
            ✓ cardiofrequenzimetro
            ✓ GPS
            ✓ Scegli la tua interfaccia preferita
            ✓ Contapassi
            ✓ Impermeabile pe ril nuoto 
            e molto altro..
            Con un utilizzo medio devi caricare il tuo smartwatch dopo circa un giorno, ma questo non è affatto un problema.
            Questo smartwatch ricarica fino all\'80% entro 1 ora. Questo smartwatch di questa generazione 4 è inoltre dotato di un chip NFC per, tra gli altri, Google Pay. 
            Scegli smart e fashion. Scegli lo smartwatch Fossil.','quantity_sold' => 1]);
        $Q_ExploristP4I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Q Explorist/Fossil_Q Explorist_FT4019_Rosa.png', 'main' => '1']);
        $Q_ExploristP4I2 = new Image(['path_image' => 'storage/Orologi/Fossil/Q Explorist/Fossil_Q Explorist_FT4019_Rosa_1.png', 'main' => '0']);
        $Q_ExploristP4I3 = new Image(['path_image' => 'storage/Orologi/Fossil/Q Explorist/Fossil_Q Explorist_FT4019_Rosa_2.png', 'main' => '0']);
        $Q_ExploristP4S = new Specification(['case_size' => '45mm', 'material' => 'Inox Colorato', 'case_thickness' => '12.5mm', 'glass' => 'Amoled', 'strap_material' => 'Silicone', 'closing' => 'Fibbie', 'movement' => 'Digitale smart', 'warranty' => '1 anno']);
        $Q_ExploristP4S->dial_color = $rosa->id;
        $Q_ExploristP4S->strap_color = $rosa->id;
        $Q_ExploristP4->collection_id = $Q_Explorist->id;
        $Q_ExploristP4->supplier_id = $fornitore1->id;
        $Q_ExploristP4->color_id = $rosa->id;
        $Q_ExploristP4->save();
        $Q_ExploristP4->categories()->save($smart);
        $Q_ExploristP4->categories()->save($water_resistence);
        $Q_ExploristP4->categories()->save($sport);
        $Q_ExploristP4->images()->save($Q_ExploristP4I1);
        $Q_ExploristP4->images()->save($Q_ExploristP4I2);
        $Q_ExploristP4->images()->save($Q_ExploristP4I3);
        $Q_ExploristP4->specification()->save($Q_ExploristP4S);
        $Q_Explorist->products()->save($Q_ExploristP4);



        /* Guess */

        $Guess = new Brand(['name' => 'Guess', 'path_logo' => 'storage/Logo/Logo_Guess.png']);
        $Guess->save();

        /* Collezioni Guess */
        $Atlas = new Collection(['name' => 'Atlas']);
        $Guess->collections()->save($Atlas);

        /* Prodotti Guess */
        $Atlas_P1 = new Product(['cod' => 'GAW668','price' => '199', 'stock_availability' => '10',
            'genre' => 'M','long_desc' => 'Questo orologio Guess ha una cassa in acciaio inox con un diametro di 45 mm ed è dotato di un cinturino in Metallo. All\'interno ha un movimento Cronografo al quarzo per orologi di qualità ed è finito con un vetro di tipo minerale.
            L\'orologio è impermeabile a 5ATM. Questo significa che l\'orologio è adatto per uso sotto doccia. 
            L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.','quantity_sold' => 1]);
        $Atlas_P1I1 = new Image(['path_image' => 'storage/Orologi/Guess/Atlas/Guess_Atlas_1.png', 'main' => '1']);
        $Atlas_P1I2 = new Image(['path_image' => 'storage/Orologi/Guess/Atlas/Guess_Atlas_2.png', 'main' => '0']);
        $Atlas_P1I3 = new Image(['path_image' => 'storage/Orologi/Guess/Atlas/Guess_Atlas_3.png', 'main' => '0']);
        $Atlas_P1S = new Specification(['case_size' => '45mm', 'material' => 'Inox', 'case_thickness' => '12.3mm', 'glass' => 'Minerale', 'strap_material' => 'Metallo', 'closing' => 'Chiusura pieghevole con pulsanti', 'movement' => 'Cronografo', 'warranty' => '2 anni']);
        $Atlas_P1S->dial_color = $argento->id;
        $Atlas_P1S->strap_color = $argento->id;
        $Atlas_P1->collection_id = $Atlas->id;
        $Atlas_P1->supplier_id = $fornitore2->id;
        $Atlas_P1->color_id = $argento->id;
        $Atlas_P1->save();
        $Atlas_P1->categories()->save($classic);
        $Atlas_P1->images()->save($Atlas_P1I1);
        $Atlas_P1->images()->save($Atlas_P1I2);
        $Atlas_P1->images()->save($Atlas_P1I3);
        $Atlas_P1->specification()->save($Atlas_P1S);
        $Atlas->products()->save($Atlas_P1);



        /* Hugo Boss */
        $Hugo_Boss = new Brand(['name' => 'Hugo Boss', 'path_logo' => 'storage/Logo/Logo_Hugo Boss.png']);
        $Hugo_Boss->save();

        /* Collezioni Hugo Boss */
        $Exist = new Collection(['name' => 'Exist']);
        $Hugo_Boss->collections()->save($Exist);

        /* Prodotti Hugo Boss */
        $Exist_P1 = new Product(['cod' => 'HBE152','price' => '199', 'stock_availability' => '8',
            'genre' => 'M','long_desc' => 'Questo orologio Hugo ha una cassa in colore ricoperto acciaio inossidabile con un diametro di 41 mm ed è dotato di un cinturino in Metallo. All\'interno ha un movimento quarzo per orologi di qualità ed è finito con un vetro di tipo minerale.
            L\'orologio è impermeabile a 3ATM. Ciò significa che l\'orologio è impermeabile ai spruzzi. 
            L\'orologio è fornito con 2 anni di garanzia in tutto il mondo..','quantity_sold' => 1]);
        $Exist_P1I1 = new Image(['path_image' => 'storage/Orologi/Hugo Boss/Exist/Hugo Boss_Exist_1.png', 'main' => '1']);
        $Exist_P1I2 = new Image(['path_image' => 'storage/Orologi/Hugo Boss/Exist/Hugo Boss_Exist_2.png', 'main' => '0']);
        $Exist_P1I3 = new Image(['path_image' => 'storage/Orologi/Hugo Boss/Exist/Hugo Boss_Exist_3.png', 'main' => '0']);
        $Exist_P1S = new Specification(['case_size' => '40.5mm', 'material' => 'Inox Colorato', 'case_thickness' => '6.2mm', 'glass' => 'Minerale', 'strap_material' => 'Metallo', 'closing' => 'Milanese Clasp', 'movement' => 'Quarzo', 'warranty' => '2 anni']);
        $Exist_P1S->dial_color = $blu->id;
        $Exist_P1S->strap_color = $blu->id;
        $Exist_P1->collection_id = $Exist->id;
        $Exist_P1->supplier_id = $fornitore1->id;
        $Exist_P1->color_id = $blu->id;
        $Exist_P1->save();
        $Exist_P1->categories()->save($classic);
        $Exist_P1->images()->save($Exist_P1I1);
        $Exist_P1->images()->save($Exist_P1I2);
        $Exist_P1->images()->save($Exist_P1I3);
        $Exist_P1->specification()->save($Exist_P1S);
        $Exist->products()->save($Exist_P1);



        /* Lacoste */
        $Lacoste = new Brand(['name' => 'Lacoste','path_logo' => 'storage/Logo/Logo_Lacoste.png']);
        $Lacoste->save();

        /* Collezioni Lacoste */
        $Lacoste_Moon = new Collection(['name' => 'Moon']);
        $Lacoste->collections()->save($Lacoste_Moon);

        $Lacoste_12_12 = new Collection(['name' => '12.12']);
        $Lacoste->collections()->save($Lacoste_12_12);

        /* Prodotti Lacoste */
        $Lacoste_12_12_P1 = new Product(['cod' => 'LC7905','price' => '99', 'stock_availability' => '6',
            'genre' => 'M','long_desc' => 'Questo orologio Lacoste ha una cassa in Gomma con un diametro di 42 mm ed è dotato di un cinturino in Gomma. All\'interno ha un movimento quarzo per orologi di qualità ed è finito con un vetro di tipo minerale.
            L\'orologio è impermeabile a 3ATM. Ciò significa che l\'orologio è impermeabile ai spruzzi. 
            L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.','quantity_sold' => 1]);
        $Lacoste_12_12_P1I1 = new Image(['path_image' => 'storage/Orologi/Lacoste/12.12/Lacoste_12.12_LC7905_Blu.png', 'main' => '1']);
        $Lacoste_12_12_P1I2 = new Image(['path_image' => 'storage/Orologi/Lacoste/12.12/Lacoste_12.12_LC7905_Blu_1.png', 'main' => '0']);
        $Lacoste_12_12_P1I3 = new Image(['path_image' => 'storage/Orologi/Lacoste/12.12/Lacoste_12.12_LC7905_Blu_2.png', 'main' => '0']);
        $Lacoste_12_12_P1S = new Specification(['case_size' => '42mm', 'material' => 'Plastica / Resina', 'case_thickness' => '11.1mm', 'glass' => 'Minerale', 'strap_material' => 'Cuoio', 'closing' => 'Fibbie', 'movement' => 'Quarzo', 'warranty' => '2 anni']);
        $Lacoste_12_12_P1S->dial_color = $blu->id;
        $Lacoste_12_12_P1S->strap_color = $blu->id;
        $Lacoste_12_12_P1->collection_id = $Lacoste_12_12->id;
        $Lacoste_12_12_P1->supplier_id = $fornitore2->id;
        $Lacoste_12_12_P1->color_id = $blu->id;
        $Lacoste_12_12_P1->save();
        $Lacoste_12_12_P1->categories()->save($classic);
        $Lacoste_12_12_P1->images()->save($Lacoste_12_12_P1I1);
        $Lacoste_12_12_P1->images()->save($Lacoste_12_12_P1I2);
        $Lacoste_12_12_P1->images()->save($Lacoste_12_12_P1I3);
        $Lacoste_12_12_P1->specification()->save($Lacoste_12_12_P1S);
        $Lacoste_12_12->products()->save($Lacoste_12_12_P1);

        $Lacoste_12_12_P2 = new Product(['cod' => 'LC7907', 'price' => '99', 'stock_availability' => '8',
            'genre' => 'M', 'long_desc' => 'Questo orologio Lacoste ha una cassa in plastica con un diametro di 42 mm ed è dotato di un cinturino in Gomma. All\'interno ha un movimento quarzo per orologi di qualità ed è finito con un vetro di tipo minerale.
            L\'orologio è impermeabile a 5ATM. Questo significa che l\'orologio è adatto per uso sotto doccia. 
            L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.']);
        $Lacoste_12_12_P2I1 = new Image(['path_image' => 'storage/Orologi/Lacoste/12.12/Lacoste_12.12_LC7907_Verde.png', 'main' => '1']);
        $Lacoste_12_12_P2I2 = new Image(['path_image' => 'storage/Orologi/Lacoste/12.12/Lacoste_12.12_LC7907_Verde_1.png', 'main' => '0']);
        $Lacoste_12_12_P2I3 = new Image(['path_image' => 'storage/Orologi/Lacoste/12.12/Lacoste_12.12_LC7907_Verde_2.png', 'main' => '0']);
        $Lacoste_12_12_P2S = new Specification(['case_size' => '42mm', 'material' => 'Plastica / Resina', 'case_thickness' => '11.1mm', 'glass' => 'Minerale', 'strap_material' => 'Cuoio', 'closing' => 'Fibbie', 'movement' => 'Quarzo', 'warranty' => '2 anni']);
        $Lacoste_12_12_P2S->dial_color = $verde->id;
        $Lacoste_12_12_P2S->strap_color = $verde->id;
        $Lacoste_12_12_P2->collection_id = $Lacoste_12_12->id;
        $Lacoste_12_12_P2->supplier_id = $fornitore2->id;
        $Lacoste_12_12_P2->color_id = $verde->id;
        $Lacoste_12_12_P2->save();
        $Lacoste_12_12_P2->categories()->save($classic);
        $Lacoste_12_12_P2->images()->save($Lacoste_12_12_P2I1);
        $Lacoste_12_12_P2->images()->save($Lacoste_12_12_P2I2);
        $Lacoste_12_12_P2->images()->save($Lacoste_12_12_P2I3);
        $Lacoste_12_12_P2->specification()->save($Lacoste_12_12_P2S);
        $Lacoste_12_12->products()->save($Lacoste_12_12_P2);


        $Moon_P1 = new Product(['cod' => 'LCM233', 'price' => '139', 'stock_availability' => '12',
            'genre' => 'F', 'long_desc' => 'Questo orologio Lacoste ha una cassa in acciaio inox con un diametro di 35 mm ed è dotato di un cinturino in Pelle. All\'interno ha un movimento quarzo per orologi di qualità ed è finito con un vetro di tipo minerale.
            L\'orologio è impermeabile a 3ATM. Ciò significa che l\'orologio è impermeabile ai spruzzi. L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.','quantity_sold' => 2]);
        $Moon_P1I1 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Blu_1.png', 'main' => '1']);
        $Moon_P1I2 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Blu_2.png', 'main' => '0']);
        $Moon_P1I3 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Blu_3.png', 'main' => '0']);
        $Moon_P1S = new Specification(['case_size' => '35mm', 'material' => 'Inox', 'case_thickness' => '6.3mm', 'glass' => 'Minerale', 'strap_material' => 'Cuoio', 'closing' => 'Fibbie', 'movement' => 'Quarzo', 'warranty' => '2 anni']);
        $Moon_P1S->dial_color = $blu->id;
        $Moon_P1S->strap_color = $blu->id;
        $Moon_P1->collection_id = $Lacoste_Moon->id;
        $Moon_P1->supplier_id = $fornitore2->id;
        $Moon_P1->color_id = $blu->id;
        $Moon_P1->save();
        $Moon_P1->categories()->save($classic);
        $Moon_P1->images()->save($Moon_P1I1);
        $Moon_P1->images()->save($Moon_P1I2);
        $Moon_P1->images()->save($Moon_P1I3);
        $Moon_P1->specification()->save($Moon_P1S);
        $Lacoste_Moon->products()->save($Moon_P1);

        $Moon_P2 = new Product(['cod' => 'LCM234', 'price' => '139', 'stock_availability' => '19',
            'genre' => 'F', 'long_desc' => 'Questo orologio Lacoste ha una cassa in acciaio inox con un diametro di 35 mm ed è dotato di un cinturino in Pelle. All\'interno ha un movimento quarzo per orologi di qualità ed è finito con un vetro di tipo minerale.
            L\'orologio è impermeabile a 3ATM. Ciò significa che l\'orologio è impermeabile ai spruzzi. L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.', 'quantity_sold' => 3]);
        $Moon_P2I1 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Nero_1.png', 'main' => '1']);
        $Moon_P2I2 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Nero_2.png', 'main' => '0']);
        $Moon_P2I3 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Nero_3.png', 'main' => '0']);
        $Moon_P2S = new Specification(['case_size' => '42mm', 'material' => 'Plastica / Resina', 'case_thickness' => '11.3mm', 'glass' => 'Minerale', 'strap_material' => 'Silicone', 'closing' => 'Fibbie', 'movement' => 'Quarzo', 'warranty' => '2 anni']);
        $Moon_P2S->dial_color = $nero->id;
        $Moon_P2S->strap_color = $nero->id;
        $Moon_P2->collection_id = $Lacoste_Moon->id;
        $Moon_P2->supplier_id = $fornitore2->id;
        $Moon_P2->color_id = $nero->id;
        $Moon_P2->save();
        $Moon_P2->categories()->save($classic);
        $Moon_P2->images()->save($Moon_P2I1);
        $Moon_P2->images()->save($Moon_P2I2);
        $Moon_P2->images()->save($Moon_P2I3);
        $Moon_P2->specification()->save($Moon_P2S);
        $Lacoste_Moon->products()->save($Moon_P2);

        $Moon_P3 = new Product(['cod' => 'LCM236', 'price' => '139', 'stock_availability' => '10',
            'genre' => 'F', 'long_desc' => 'Questo orologio Lacoste ha una cassa in acciaio inox con un diametro di 35 mm ed è dotato di un cinturino in Pelle. All\'interno ha un movimento quarzo per orologi di qualità ed è finito con un vetro di tipo minerale.
            L\'orologio è impermeabile a 3ATM. Ciò significa che l\'orologio è impermeabile ai spruzzi. L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.', 'quantity_sold' => 3]);
        $Moon_P3I1 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Rosa_1.png', 'main' => '1']);
        $Moon_P3I2 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Rosa_2.png', 'main' => '0']);
        $Moon_P3I3 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Rosa_3.png', 'main' => '0']);
        $Moon_P3S = new Specification(['case_size' => '42mm', 'material' => 'Silicone Rubber', 'case_thickness' => '12mm', 'glass' => 'Minerale', 'strap_material' => 'Silicone', 'closing' => 'Fibbie', 'movement' => 'Quarzo', 'warranty' => '1 anno']);
        $Moon_P3S->dial_color = $rosa->id;
        $Moon_P3S->strap_color = $rosa->id;
        $Moon_P3->collection_id = $Lacoste_Moon->id;
        $Moon_P3->supplier_id = $fornitore2->id;
        $Moon_P3->color_id = $rosa->id;
        $Moon_P3->save();
        $Moon_P3->categories()->save($classic);
        $Moon_P3->images()->save($Moon_P3I1);
        $Moon_P3->images()->save($Moon_P3I2);
        $Moon_P3->images()->save($Moon_P3I3);
        $Moon_P3->specification()->save($Moon_P3S);
        $Lacoste_Moon->products()->save($Moon_P3);



        /* Swarovski */
        $Swarovski = new Brand(['name' => 'Swarovski','path_logo' => 'storage/Logo/Logo_Swarovski.png']);
        $Swarovski->save();

        /* Collezioni Swarovski */
        $Stella = new Collection(['name' => 'Stella']);
        $Swarovski->collections()->save($Stella);

        /*Prodotti Swaroski */
        $Stella_P1 = new Product(['cod' => 'SW5376','price' => '249', 'stock_availability' => '15', 'genre' => 'F',
            'long_desc' => 'Questo orologio Swarovski ha una cassa in acciaio inox con un diametro di 29 mm ed è dotato di un cinturino in Pelle. All\'interno ha un movimento quarzo svizzero per orologi di qualità ed è finito con un vetro di tipo minerale.
        L\'orologio è impermeabile a 5ATM. Questo significa che l\'orologio è adatto per uso sotto doccia. L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.', 'quantity_sold' => 5]);
        $Stella_P1I1 = new Image(['path_image' => 'storage/Orologi/Swarovski/Stella/Swarovski_Stella_Argento_1.png', 'main' => '1']);
        $Stella_P1S = new Specification(['case_size' => '29mm', 'material' => 'Inox', 'case_thickness' => '7.5mm', 'glass' => 'Minerale', 'strap_material' => 'Cuoio', 'closing' => 'Fibbie', 'movement' => 'Quarzo Svizzero', 'warranty' => '2 anni']);
        $Stella_P1S->dial_color = $argento->id;
        $Stella_P1S->strap_color = $bianco->id;
        $Stella_P1->collection_id = $Stella->id;
        $Stella_P1->supplier_id = $fornitore1->id;
        $Stella_P1->color_id = $argento->id;
        $Stella_P1->save();
        $Stella_P1->categories()->save($classic);
        $Stella_P1->images()->save($Stella_P1I1);
        $Stella_P1->specification()->save($Stella_P1S);
        $Stella->products()->save($Stella_P1);

        $Stella_P2 = new Product(['cod' => 'SW5470','price' => '349', 'stock_availability' => '10', 'genre' => 'F',
            'long_desc' => 'Questo orologio Swarovski ha una cassa in acciaio inox oro rosa con un diametro di 37 mm ed è dotato di un cinturino in Metallo. 
            All\'interno ha un movimento quarzo svizzero per orologi di qualità ed è finito con un vetro di tipo minerale.
            L\'orologio è impermeabile a 3ATM. Ciò significa che l\'orologio è impermeabile ai spruzzi. 
            L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.', 'quantity_sold' => 8]);
        $Stella_P2I1 = new Image(['path_image' => 'storage/Orologi/Swarovski/Stella/Swarovski_Stella_Rosa_1.png', 'main' => '1']);
        $Stella_P2S = new Specification(['case_size' => '37mm', 'material' => 'Inox Oro Rosso', 'case_thickness' => '9,7mm', 'glass' => 'Minerale', 'strap_material' => 'Metallo', 'closing' => 'Fibbia Decorata', 'movement' => 'Quarzo Svizzero', 'warranty' => '2 anni']);
        $Stella_P2S->dial_color = $bianco->id;
        $Stella_P2S->strap_color = $oro_rosa->id;
        $Stella_P2->collection_id = $Stella->id;
        $Stella_P2->supplier_id = $fornitore1->id;
        $Stella_P2->color_id = $oro_rosa->id;
        $Stella_P2->save();
        $Stella_P2->categories()->save($classic);
        $Stella_P2->images()->save($Stella_P2I1);
        $Stella_P2->specification()->save($Stella_P2S);
        $Stella->products()->save($Stella_P2);

        $Stella_P3 = new Product(['cod' => 'SW5373','price' => '279', 'stock_availability' => '8', 'genre' => 'F',
            'long_desc' => 'Questo orologio Swarovski ha una cassa in acciaio inox placcato oro con un diametro di 29 mm ed è dotato di un cinturino in Pelle. All\'interno ha un movimento quarzo svizzero per orologi di qualità ed è finito con un vetro di tipo minerale.
            L\'orologio è impermeabile a 5ATM. Questo significa che l\'orologio è adatto per uso sotto doccia. 
            L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.', 'quantity_sold' => 3]);
        $Stella_P3I1 = new Image(['path_image' => 'storage/Orologi/Swarovski/Stella/Swarovski_Stella_Viola_1.png', 'main' => '1']);
        $Stella_P3S = new Specification(['case_size' => '29mm', 'material' => 'Inox Oro', 'case_thickness' => '7.5mm', 'glass' => 'Minerale', 'strap_material' => 'Cuoio', 'closing' => 'Nessuno', 'movement' => 'Quarzo Svizzero', 'warranty' => '2 anni']);
        $Stella_P3S->dial_color = $oro_rosa->id;
        $Stella_P3S->strap_color = $viola->id;
        $Stella_P3->collection_id = $Stella->id;
        $Stella_P3->supplier_id = $fornitore1->id;
        $Stella_P3->color_id = $viola->id;
        $Stella_P3->save();
        $Stella_P3->categories()->save($classic);
        $Stella_P3->images()->save($Stella_P3I1);
        $Stella_P3->specification()->save($Stella_P3S);
        $Stella->products()->save($Stella_P3);



        /* Tissot */
        $Tissot = new Brand(['name' => 'Tissot','path_logo' => 'storage/Logo/Logo_Tissot.png']);
        $Tissot->save();

        /* Collezioni Tissot */
        $Lovely = new Collection(['name' => 'Lovely']);
        $Tissot->collections()->save($Lovely);

        $Chrono = new Collection(['name' => 'Chrono']);
        $Tissot->collections()->save($Chrono);

        $Gent = new Collection(['name' => 'Gent XL']);
        $Tissot->collections()->save($Gent);

        $Seastar = new Collection(['name'=>'Seastar']);
        $Tissot->collections()->save($Seastar);


        /*Prodotto Tissot*/
        $Gent_P1 = new Product(['cod' => 'TG1164','price' => '240', 'stock_availability' => '12', 'genre' => 'M',
            'long_desc' => 'Questo orologio Tissot ha una cassa in acciaio inox con un diametro di 42 mm ed è dotato di un cinturino in Pelle. All\'interno ha un movimento quarzo per orologi di qualità ed è finito con un vetro di tipo Zaffiro.
            L\'orologio è impermeabile a 10ATM. Questo significa che l\'orologio è adatto al nuoto. 
            L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.', 'quantity_sold' => 9]);
        $Gent_P1I1 = new Image(['path_image' => 'storage/Orologi/Tissot/Gent XL/Tissot_Gent XL_Nero_1.png', 'main' => '1']);
        $Gent_P1S = new Specification(['case_size' => '42mm', 'material' => 'Inox', 'case_thickness' => '9.8mm', 'glass' => 'Zaffiro', 'strap_material' => 'Pelle', 'closing' => 'Fibbie', 'movement' => 'Quarzo', 'warranty' => '2 anni']);
        $Gent_P1S->dial_color = $nero->id;
        $Gent_P1S->strap_color = $nero->id;
        $Gent_P1->collection_id = $Gent->id;
        $Gent_P1->supplier_id = $fornitore2->id;
        $Gent_P1->color_id = $nero->id;
        $Gent_P1->save();
        $Gent_P1->categories()->save($classic);
        $Gent_P1->categories()->save($sport);
        $Gent_P1->images()->save($Gent_P1I1);
        $Gent_P1->specification()->save($Gent_P1S);
        $Gent->products()->save($Gent_P1);

        $Gent_P2 = new Product(['cod' => 'TG1165','price' => '240', 'stock_availability' => '6', 'genre' => 'M',
            'long_desc' => 'Questo orologio Tissot ha una cassa in acciaio inox con un diametro di 42 mm ed è dotato di un cinturino in Pelle. All\'interno ha un movimento quarzo per orologi di qualità ed è finito con un vetro di tipo Zaffiro.
            L\'orologio è impermeabile a 10ATM. Questo significa che l\'orologio è adatto al nuoto. 
            L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.', 'quantity_sold' => 3]);
        $Gent_P2I1 = new Image(['path_image' => 'storage/Orologi/Tissot/Gent XL/Tissot_Gent XL_Blu_1.png', 'main' => '1']);
        $Gent_P2S = new Specification(['case_size' => '42mm', 'material' => 'Inox', 'case_thickness' => '9.8mm', 'glass' => 'Zaffiro', 'strap_material' => 'Pelle', 'closing' => 'Fibbie', 'movement' => 'Quarzo', 'warranty' => '2 anni']);
        $Gent_P2S->dial_color = $blu->id;
        $Gent_P2S->strap_color = $marrone->id;
        $Gent_P2->collection_id = $Gent->id;
        $Gent_P2->supplier_id = $fornitore2->id;
        $Gent_P2->color_id = $marrone->id;
        $Gent_P2->save();
        $Gent_P2->categories()->save($classic);
        $Gent_P2->categories()->save($sport);
        $Gent_P2->images()->save($Gent_P2I1);
        $Gent_P2->specification()->save($Gent_P2S);
        $Gent->products()->save($Gent_P2);

        $Lovely_P1 = new Product(['cod' => 'TL5810','price' => '310', 'stock_availability' => '5', 'genre' => 'F',
            'long_desc' => 'Questo orologio Tissot ha una cassa in acciaio inox con un diametro di 20 mm ed è dotato di un cinturino in Metallo. All\'interno ha un movimento quarzo per orologi di qualità ed è finito con un vetro di tipo Zaffiro.
            L\'orologio è impermeabile a 3ATM. Ciò significa che l\'orologio è impermeabile ai spruzzi. 
            L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.', 'quantity_sold' => 6]);
        $Lovely_P1I1 = new Image(['path_image' => 'storage/Orologi/Tissot/Lovely/Tissot_Lovely_Argento_1.png', 'main' => '1']);
        $Lovely_P1S = new Specification(['case_size' => '20mm', 'material' => 'Inox', 'case_thickness' => '8mm', 'glass' => 'Zaffiro', 'strap_material' => 'Metallo', 'closing' => 'Milanese Clasp', 'movement' => 'Quarzo', 'warranty' => '2 anni']);
        $Lovely_P1S->dial_color = $argento->id;
        $Lovely_P1S->strap_color = $argento->id;
        $Lovely_P1->collection_id = $Lovely->id;
        $Lovely_P1->supplier_id = $fornitore2->id;
        $Lovely_P1->color_id = $argento->id;
        $Lovely_P1->save();
        $Lovely_P1->categories()->save($classic);
        $Lovely_P1->images()->save($Lovely_P1I1);
        $Lovely_P1->specification()->save($Lovely_P1S);
        $Lovely->products()->save($Lovely_P1);

        $Lovely_P2 = new Product(['cod' => 'TL5811','price' => '325', 'stock_availability' => '3', 'genre' => 'F',
            'long_desc' => 'Questo orologio Tissot ha una cassa in acciaio inox placcato oro con un diametro di 20 mm ed è dotato di un cinturino in Metallo. All\'interno ha un movimento quarzo per orologi di qualità ed è finito con un vetro di tipo Zaffiro.
            L\'orologio è impermeabile a 3ATM. Ciò significa che l\'orologio è impermeabile ai spruzzi.
            L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.', 'quantity_sold' => 8]);
        $Lovely_P2I1 = new Image(['path_image' => 'storage/Orologi/Tissot/Lovely/Tissot_Lovely_Oro_1.png', 'main' => '1']);
        $Lovely_P2S = new Specification(['case_size' => '20mm', 'material' => 'Inox', 'case_thickness' => '8mm', 'glass' => 'Zaffiro', 'strap_material' => 'Metallo', 'closing' => 'Milanese Clasp', 'movement' => 'Quarzo', 'warranty' => '2 anni']);
        $Lovely_P2S->dial_color = $argento->id;
        $Lovely_P2S->strap_color = $oro->id;
        $Lovely_P2->collection_id = $Lovely->id;
        $Lovely_P2->supplier_id = $fornitore2->id;
        $Lovely_P2->color_id = $argento->id;
        $Lovely_P2->save();
        $Lovely_P2->categories()->save($classic);
        $Lovely_P2->images()->save($Lovely_P2I1);
        $Lovely_P2->specification()->save($Lovely_P2S);
        $Lovely->products()->save($Lovely_P2);

        $Seastar_P1 = new Product(['cod' => 'TS1204','price' => '495', 'stock_availability' => '10', 'genre' => 'M',
            'long_desc' => 'Questo orologio Tissot ha una cassa in acciaio inox con un diametro di 45 mm ed è dotato di un cinturino in Gomma. All\'interno ha un movimento Cronografo al quarzo per orologi di qualità ed è finito con un vetro di tipo Zaffiro.
            L\'orologio è impermeabile a 30ATM. Questo significa che l\'orologio è adatto a immersioni profonde.
            L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.', 'quantity_sold' => 12]);
        $Seastar_P1I1 = new Image(['path_image' => 'storage/Orologi/Tissot/Seastar/Tissot_Seastar_Arancione_1.png', 'main' => '1']);
        $Seastar_P1S = new Specification(['case_size' => '45mm', 'material' => 'Inox', 'case_thickness' => '13.5mm', 'glass' => 'Zaffiro', 'strap_material' => 'Silicone', 'closing' => 'Fibbie', 'movement' => 'Cronografo', 'warranty' => '2 anni']);
        $Seastar_P1S->dial_color = $nero->id;
        $Seastar_P1S->strap_color = $arancione->id;
        $Seastar_P1->collection_id = $Seastar->id;
        $Seastar_P1->supplier_id = $fornitore2->id;
        $Seastar_P1->color_id = $arancione->id;
        $Seastar_P1->save();
        $Seastar_P1->categories()->save($sport);
        $Seastar_P1->images()->save($Seastar_P1I1);
        $Seastar_P1->specification()->save($Seastar_P1S);
        $Seastar->products()->save($Seastar_P1);

        $Seastar_P2 = new Product(['cod' => 'TS1205','price' => '490', 'stock_availability' => '15', 'genre' => 'M',
            'long_desc' => 'Questo orologio Tissot ha una cassa in colore ricoperto acciaio inossidabile con un diametro di 45 mm ed è dotato di un cinturino in Gomma. All\'interno ha un movimento Cronografo al quarzo per orologi di qualità ed è finito con un vetro di tipo Zaffiro.
            L\'orologio è impermeabile a 30ATM. Questo significa che l\'orologio è adatto a immersioni profonde. 
            L\'orologio è fornito con 2 anni di garanzia in tutto il mondo.', 'quantity_sold' => 8]);
        $Seastar_P2I1 = new Image(['path_image' => 'storage/Orologi/Tissot/Seastar/Tissot_Seastar_Nero_1.png', 'main' => '1']);
        $Seastar_P2S = new Specification(['case_size' => '45mm', 'material' => 'Inox', 'case_thickness' => '13.5mm', 'glass' => 'Zaffiro', 'strap_material' => 'Silicone', 'closing' => 'Fibbie', 'movement' => 'Cronografo', 'warranty' => '2 anni']);
        $Seastar_P2S->dial_color = $nero->id;
        $Seastar_P2S->strap_color = $nero->id;
        $Seastar_P2->collection_id = $Seastar->id;
        $Seastar_P2->supplier_id = $fornitore2->id;
        $Seastar_P2->color_id = $nero->id;
        $Seastar_P2->save();
        $Seastar_P2->categories()->save($sport);
        $Seastar_P2->images()->save($Seastar_P2I1);
        $Seastar_P2->specification()->save($Seastar_P2S);
        $Seastar->products()->save($Seastar_P2);


        /* Wellington */
        $Wellington = new Brand(['name' => 'Wellington','path_logo' => 'storage/Logo/Logo_Wellington.png']);
        $Wellington->save();

        /* Collezioni Wellington */
        $Roselyn = new Collection(['name' => 'Roselyn']);
        $Wellington->collections()->save($Roselyn);

        $Sheffield = new Collection(['name' => 'Sheffield']);
        $Wellington->collections()->save($Sheffield);

        $Bayswater = new Collection(['name' => 'Bayswater']);
        $Wellington->collections()->save($Bayswater);

        /*Prodotti Wellington */
        $Bayswater_P1 = new Product(['cod' => 'DWB011','price' => '139', 'stock_availability' => '5', 'genre' => 'U',
            'long_desc' => 'Dotato di caratteristiche classiche quali una cassa sottile, dettagli in oro rosa o argento e il nostro storico cinturino NATO in versione blu notte, Classic Bayswater è un pratico orologio indossabile sia di giorno che di sera.', 'quantity_sold' => 9]);
        $Bayswater_P1I1 = new Image(['path_image' => 'storage/Orologi/Wellington/Bayswater/Wellington_Bayswater_1.png', 'main' => '1']);
        $Bayswater_P1I2 = new Image(['path_image' => 'storage/Orologi/Wellington/Bayswater/Wellington_Bayswater_2.png', 'main' => '0']);
        $Bayswater_P1I3 = new Image(['path_image' => 'storage/Orologi/Wellington/Bayswater/Wellington_Bayswater_3.png', 'main' => '0']);
        $Bayswater_P1S = new Specification(['case_size' => '12mm', 'material' => 'Inox', 'case_thickness' => '6mm', 'glass' => 'Zaffiro', 'strap_material' => 'Acciaio Inox Con Doppia Placcatura(316L', 'closing' => 'Fibbie', 'movement' => 'Quarzo Giapponese', 'warranty' => '2 anni']);
        $Bayswater_P1S->dial_color = $argento->id;
        $Bayswater_P1S->strap_color = $blu->id;
        $Bayswater_P1->collection_id = $Bayswater->id;
        $Bayswater_P1->supplier_id = $fornitore2->id;
        $Bayswater_P1->color_id = $blu->id;
        $Bayswater_P1->save();
        $Bayswater_P1->categories()->save($classic);
        $Bayswater_P1->images()->save($Bayswater_P1I1);
        $Bayswater_P1->images()->save($Bayswater_P1I2);
        $Bayswater_P1->images()->save($Bayswater_P1I3);
        $Bayswater_P1->specification()->save($Bayswater_P1S);
        $Bayswater->products()->save($Bayswater_P1);


        $Roselyn_P1 = new Product(['cod' => 'DWR001','price' => '139', 'stock_availability' => '8', 'genre' => 'F',
            'long_desc' => 'Dotato di caratteristiche classiche quali una cassa sottile, dettagli in oro rosa o argento e il nostro famoso cinturino NATO in versione rosso rubino, Classic Roselyn è un pratico orologio indossabile sia di giorno che di sera.', 'quantity_sold' => 9]);
        $Roselyn_P1I1 = new Image(['path_image' => 'storage/Orologi/Wellington/Roselyn/Wellington_Roselyn_Rosso_1.png', 'main' => '1']);
        $Roselyn_P1I2 = new Image(['path_image' => 'storage/Orologi/Wellington/Roselyn/Wellington_Roselyn_Rosso_2.png', 'main' => '0']);
        $Roselyn_P1I3 = new Image(['path_image' => 'storage/Orologi/Wellington/Roselyn/Wellington_Roselyn_Rosso_3.png', 'main' => '0']);
        $Roselyn_P1S = new Specification(['case_size' => '10mm', 'material' => 'Inox', 'case_thickness' => '6mm', 'glass' => 'Zaffiro', 'strap_material' => 'Acciaio Inox', 'closing' => 'Fibbie', 'movement' => 'Quarzo Giapponese', 'warranty' => '2 anni']);
        $Roselyn_P1S->dial_color = $rosso_rubino->id;
        $Roselyn_P1S->strap_color = $oro_rosa->id;
        $Roselyn_P1->collection_id = $Roselyn->id;
        $Roselyn_P1->supplier_id = $fornitore2->id;
        $Roselyn_P1->color_id = $rosso_rubino->id;
        $Roselyn_P1->save();
        $Roselyn_P1->categories()->save($classic);
        $Roselyn_P1->images()->save($Roselyn_P1I1);
        $Roselyn_P1->images()->save($Roselyn_P1I2);
        $Roselyn_P1->images()->save($Roselyn_P1I3);
        $Roselyn_P1->specification()->save($Roselyn_P1S);
        $Roselyn->products()->save($Roselyn_P1);



        /*---   BANNER   -----------------------------------------------------*/

        $Double_Down_P44_B1 = new Banner(['path_image'=>'storage/Banner/Diesel/Double Down P44/Diesel_Double Down P44_Main_1.jpg','type'=>'Main','counter'=>1,'visible'=>0]);
        $Double_Down_P44->banners()->save($Double_Down_P44_B1);

        $Sport_B1 = new Banner(['path_image'=>'storage/Banner/Fossil/Sport/Fossil_Sport_Main_1.jpg','type'=>'Main','counter'=>1,'visible'=>1]);
        $Sport->banners()->save($Sport_B1);

        $Lacoste_Moon_B1 = new Banner(['path_image'=>'storage/Banner/Lacoste/Moon/Lacoste_Moon_Main_1.jpg','type'=>'Main','counter'=>1,'visible'=>1]);
        $Lacoste_Moon->banners()->save($Lacoste_Moon_B1);

        $Lacoste_Moon_B2 = new Banner(['path_image'=>'storage/Banner/Lacoste/Moon/Lacoste_Moon_Main_2.jpg','type'=>'Main','counter'=>2,'visible'=>0]);
        $Lacoste_Moon->banners()->save($Lacoste_Moon_B2);

        $Lacoste_Moon_B3 = new Banner(['path_image'=>'storage/Banner/Lacoste/Moon/Lacoste_Moon_Main_3.jpg','type'=>'Main','counter'=>3,'visible'=>0]);
        $Lacoste_Moon->banners()->save($Lacoste_Moon_B3);

        $Stella_B1 = new Banner(['path_image'=>'storage/Banner/Swarovski/Stella/Swarovski_Stella_Sub_1.jpg','type'=>'Sub','counter'=>1,'visible'=>1]);
        $Stella->banners()->save($Stella_B1);

        $Gent_B1 = new Banner(['path_image'=>'storage/Banner/Tissot/Gent XL/Tissot_Gent XL_Main_1.jpg','type'=>'Main','counter'=>1,'visible'=>1]);
        $Gent->banners()->save($Gent_B1);

        $Gent_B2 = new Banner(['path_image'=>'storage/Banner/Tissot/Gent XL/Tissot_Gent XL_Main_2.jpg','type'=>'Main','counter'=>2,'visible'=>0]);
        $Gent->banners()->save($Gent_B2);

        $Gent_B3 = new Banner(['path_image'=>'storage/Banner/Tissot/Gent XL/Tissot_Gent XL_Main_3.jpg','type'=>'Main','counter'=>3,'visible'=>0]);
        $Gent->banners()->save($Gent_B3);

        $Lovely_B1 = new Banner(['path_image'=>'storage/Banner/Tissot/Lovely/Tissot_Lovely_Main_1.jpg','type'=>'Main','counter'=>1,'visible'=>1]);
        $Lovely->banners()->save($Lovely_B1);

        $Lovely_B2 = new Banner(['path_image'=>'storage/Banner/Tissot/Lovely/Tissot_Lovely_Main_2.jpg','type'=>'Main','counter'=>2,'visible'=>0]);
        $Lovely->banners()->save($Lovely_B2);

        $Bayswater_B1 = new Banner(['path_image'=>'storage/Banner/Wellington/Bayswater/Wellington_Bayswater_Sub_1.jpg','type'=>'Sub','counter'=>1,'visible'=>0]);
        $Bayswater->banners()->save($Bayswater_B1);

        $Roselyn_B1 = new Banner(['path_image'=>'storage/Banner/Wellington/Roselyn/Wellington_Roselyn_Sub_1.jpg','type'=>'Sub','counter'=>1,'visible'=>1]);
        $Roselyn->banners()->save($Roselyn_B1);



        /*---   OFFERTE   -----------------------------------------------------*/

        $offer1 = new Offer(['rate'=>'10','end'=>date('Y-m-d', strtotime('tomorrow')). ' 23:59:59']);
        $CarlieP1->offer()->save($offer1);
        $offer1->save();

        $offer2 = new Offer(['rate'=>'25','end'=>date('Y-m-d', strtotime('tomorrow')). ' 23:59:59']);
        $SportP1->offer()->save($offer2);
        $offer2->save();

        $offer3 = new Offer(['rate'=>'15','end'=>date('Y-m-d', strtotime('tomorrow')). ' 23:59:59']);
        $Q_ExploristP1->offer()->save($offer3);
        $offer3->save();

        $offer4 = new Offer(['rate'=>'20','end'=>date('Y-m-d', strtotime('tomorrow')). ' 23:59:59']);
        $Lacoste_12_12_P1->offer()->save($offer4);
        $offer4->save();

        $offer5 = new Offer(['rate'=>'5','end'=>date('Y-m-d', strtotime('tomorrow')). ' 23:59:59']);
        $Moon_P1->offer()->save($offer5);
        $offer5->save();

        ////////////////////////////////////////////////////////////////////
        /*---   FE   -----------------------------------------------------*/
        ////////////////////////////////////////////////////////////////////

        /*---   CLIENTI REGISTRATI   -----------------------------------------------------*/

        $user1 = new User(['name'=>'u', 'surname'=>'u', 'phone' =>'123456789', 'email'=>'u@u.it', 'password'=>'uuuuuuuu']);
        $user1->save();

        $user2 = new User(['name'=>'z', 'surname'=>'z', 'phone' =>'123456789', 'email'=>'z@z.it', 'password'=>'zzzzzzzz']);
        $user2->save();

        /*---   INDIRIZZI   -----------------------------------------------------*/

        $address1 = new Address(['address'=>'Via Meropia', 'civic_number'=>'24', 'city'=>'Roma', 'region'=>'RM', 'zip'=>'00147', 'mailing'=>1]);
        $address1->name = $user1->name;
        $address1->surname = $user1->surname;
        $user1->addresses()->save($address1);
        $address1->save();

        $address2 = new Address(['address'=>'Via Isonzo', 'civic_number'=>'35', 'city'=>'Pescara', 'region'=>'PE', 'zip'=>'65123', 'billing'=>1]);
        $address2->name = $user1->name;
        $address2->surname = $user1->surname;
        $user1->addresses()->save($address2);
        $address2->save();

        $address3 = new Address(['address'=>'Via XX Settembre', 'civic_number'=>'9', 'city'=>'L\'Aquila', 'region'=>'AQ', 'zip'=>'67100']); //indirizzo per regalo
        $address3->name = $user2->name;
        $address3->surname = $user2->surname;
        $user1->addresses()->save($address3);
        $address3->save();

        $address4 = new Address(['address'=>'Viale Tunisia', 'civic_number'=>'74', 'city'=>'Milano', 'region'=>'MI', 'zip'=>'20124', 'billing'=>1, 'mailing'=>1]);
        $address4->name = $user2->name;
        $address4->surname = $user2->surname;
        $user2->addresses()->save($address4);
        $address4->save();

        /*---   PAGAMENTI   -----------------------------------------------------*/

        $payment1 = new Payment(['name'=>'Carta di Credito']);      $payment1->save();
        $payment2 = new Payment(['name'=>'Bonifico']);              $payment2->save();

        /*---   CORRIERI   -----------------------------------------------------*/

        $courier1 = new Courier(['name'=>'Bartolini', 'contact'=>'0277889966']);        $courier1->save();
        $courier2 = new Courier(['name'=>'SDA', 'contact'=>'0277885646']);              $courier2->save();
        $courier3 = new Courier(['name'=>'Poste Italiae', 'contact'=>'0233385622']);    $courier3->save();

        /*---   STORICO ORDINI   -----------------------------------------------------*/

        $order1 = new OrderHistory(['gift'=>'0']);
        $order1->user_id = $user1->id;
        $order1->payment_id = $payment1->id;
        $order1->courier_id = $courier1->id;
        $order1->mailing_address_id = $address1->id;
        $order1->billing_address_id = $address1->id;
        $order1->save();

        $order2 = new OrderHistory(['gift'=>'0']);
        $order2->user_id = $user1->id;
        $order2->payment_id = $payment2->id;
        $order2->courier_id = $courier1->id;
        $order2->mailing_address_id = $address2->id;
        $order2->billing_address_id = $address1->id;
        $order2->save();

        $order3 = new OrderHistory(['gift'=>'1']);
        $order3->user_id = $user1->id;
        $order3->payment_id = $payment1->id;
        $order3->courier_id = $courier2->id;
        $order3->mailing_address_id = $address1->id;
        $order3->billing_address_id = $address2->id;
        $order3->save();

        $order4 = new OrderHistory(['gift'=>'0']);
        $order4->user_id = $user2->id;
        $order4->payment_id = $payment1->id;
        $order4->courier_id = $courier2->id;
        $order4->mailing_address_id = $address4->id;
        $order4->billing_address_id = $address4->id;
        $order4->save();

        $order5 = new OrderHistory(['gift'=>'0']);
        $order5->user_id = $user2->id;
        $order5->payment_id = $payment2->id;
        $order5->courier_id = $courier3->id;
        $order5->mailing_address_id = $address4->id;
        $order5->billing_address_id = $address4->id;
        $order5->save();

        $order6 = new OrderHistory(['gift'=>'1']);
        $order6->user_id = $user2->id;
        $order6->payment_id = $payment1->id;
        $order6->courier_id = $courier1->id;
        $order6->mailing_address_id = $address3->id;
        $order6->billing_address_id = $address3->id;
        $order6->save();

        /*---   PRODOTTI PER OGNI STORICO   -----------------------------------------------------*/

        $Moon_P1->orderHistories()->save($order1,['quantity' => 2, 'price' => '139']);
        $CarlieP1->orderHistories()->save($order1,['quantity' => 4, 'price' => '109']);

        $Lacoste_12_12_P1->orderHistories()->save($order2,['quantity' => 1, 'price' => '99']);
        $CarlieP3->orderHistories()->save($order2,['quantity' => 1, 'price' => '109']);

        $Q_ExploristP4->orderHistories()->save($order3,['quantity' => 1, 'price' => '239']);

        $Double_Down_P44P1->orderHistories()->save($order4,['quantity' => 2, 'price' => '89']);
        $Q_ExploristP2->orderHistories()->save($order4,['quantity' => 1, 'price' => '239']);
        //$Moon_P2->orderHistories()->save($order4,['quantity' => 2, 'price' => '139']);

        //$Moon_P2->orderHistories()->save($order5,['quantity' => 1, 'price' => '139']);
        $CarlieP2->orderHistories()->save($order5,['quantity' => 1, 'price' => '109']);
        $CarlieP1->orderHistories()->save($order5,['quantity' => 2, 'price' => '109']);
        $CarlieP1->orderHistories()->save($order5,['quantity' => 1, 'price' => '109']);

        $Moon_P1->orderHistories()->save($order6,['quantity' => 1, 'price' => '139']);
        $SportP1->orderHistories()->save($order6,['quantity' => 1, 'price' => '249']);
        $Q_ExploristP4->orderHistories()->save($order6,['quantity' => 2, 'price' => '239']);


        /*---   WISHLIST   -----------------------------------------------------*/

        $user1->productsWishlist()->save($Q_ExploristP3);
        //$user1->productsWishlist()->save($Moon_P3);
        $user1->productsWishlist()->save($SportP2);
        $user1->productsWishlist()->save($CarlieP1);
        $user1->productsWishlist()->save($Double_Down_P44P1);

        $user2->productsWishlist()->save($Q_ExploristP4);
        //$user2->productsWishlist()->save($Moon_P2);
        $user2->productsWishlist()->save($SportP2);

        /*---   REVIEW   -----------------------------------------------------*/

        $review1 = new Review(['vote'=>'5', 'title'=>'Grande Acquisto', 'text'=>'Bell\'orologio, arrivato a casa in tempi brevissimi']);
        $review1->product_id = $CarlieP1->id;
        $user1->reviews()->save($review1);
        $review1->save();

        $review2 = new Review(['vote'=>'4', 'title'=>'Consiglio di applicare una pellicola antigraffio sul quadrante',
                                            'text'=>'Ho aspettato un po\' prima di recensire questo orologio, devo dire che è perfetto per ogni tipo di outfit.
                                                        Inoltre il quadrante gli dà un aspetto elegante all\'orologio. Durante il giorno si vede bene, non me lo aspettavo.
                                                        Le funzioni che offre sono molto utili, un esempio è la sveglia o anche il timer..È arrivato con la garanzia di 24 mesi.
                                                        Un buon prodotto che consiglio di acquistare insieme ad una qualche pellicola che protegga il vetro da graffi. Per questo do 4 stelle']);
        $review2->product_id = $Q_ExploristP1->id;
        $user1->reviews()->save($review2);
        $review2->save();

        $review3 = new Review(['vote'=>'4', 'title'=>'Non potevo scegliere di meglio', 'text'=>'Ho avuto problemi con l\'ordine, l\'assistenza mi ha aiutato a risolverli. Servizio ottimo']);
        $review3->product_id = $Lacoste_12_12_P1->id;
        $user1->reviews()->save($review3);
        $review3->save();

        $review4 = new Review(['vote'=>'4','title'=>'Grande, bello e preciso',
            'text'=> 'Spedizione velocissima, imballaggio perfetto, custodia funzionale ed elegantissima, pellicole di protezione presenti, ottimo orologio grande e molto bello. 
                       Morbidissimo e molto curato nel dettaglio il cinturino in silicone, l\'orologio è quindi anche piacevole da tenere al polso.
                       Arrivato con batteria carica ed orario correttamente impostato.
                       Unica nota: la tipologia ed il colore del modello (lancette grigio scuro su quadrante nero) 
                       non permettono una visione ottimale dell\'ora quando non c\'è tanta luce ma a me piaceva molto proprio questa caratteristica estetica.']);
        $review4->product_id = $Double_Down_P44P1->id;
        $user1->reviews()->save($review4);
        $review4->save();

        $review5 = new Review(['vote'=>'4', 'title'=>'Regalo', 'text'=>'Comprato per un regalo, al festeggiato è piaciuto molto']);
        $review5->product_id = $CarlieP1->id;
        $user2->reviews()->save($review5);
        $review5->save();

        $review6 = new Review(['vote'=>'5', 'title'=>'Consigliato',
            'text'=>'Sono molto contenta di questo smartwatch, la parte smart a mio avviso funziona benissimo. 
                     Per alcuni sport, esempio il nuoto, serve scaricare app di terze parti che non sempre funzionano a dovere, ma per le mie esigenze è perfetto, contapassi e cardio sembrano affidabili.
                     Comodo e leggero da indossare.']);
        $review6->product_id = $SportP2->id;
        $user2->reviews()->save($review6);
        $review6->save();

        $review7 = new Review(['vote'=>'5', 'title'=>'WOW!!', 'text'=>'Proprio come immaginavo']);
        $review7->product_id = $Moon_P1->id;
        $user1->reviews()->save($review7);
        $review7->save();

        $review8 = new Review(['vote'=>'2', 'title'=>'#', 'text'=>'#']);
        $review8->product_id = $Lacoste_12_12->id;
        $user1->reviews()->save($review8);
        $review8->save();

        /*---   CARTS   -----------------------------------------------------*/

        $user1->products()->save($CarlieP1,['quantity'=>2]);
        $user1->products()->save($SportP2,['quantity'=>1]);
        $user1->products()->save($Moon_P1,['quantity'=>1]);
        $user1->products()->save($Lacoste_12_12_P1,['quantity'=>1]);

        $user2->products()->save($SportP2,['quantity'=>1]);

        /*---   NEWSLETTERS   -----------------------------------------------------*/

        $newsletter1 = new Newsletter(['email' => 'f14e48631f-f65fb0@inbox.mailtrap.io']);
        $newsletter1->save();

        $newsletter2 = new Newsletter(['email' => 'mail1@mail1.it']);
        $newsletter2->save();
    }
}
