<p align="center"><svg class="items-stretch" xmlns="http://www.w3.org/2000/svg" width="300" height="270" viewBox="0 0 480 453" fill="none"><path d="M137.02 257.509H161.62L146.32 299.569L131.02 257.509H132.94L146.32 294.289L159.04 259.309H137.02V257.509ZM169.537 264.709V282.109C169.537 288.069 170.477 292.269 172.357 294.709C174.277 297.109 176.897 298.309 180.217 298.309C183.537 298.309 186.137 297.109 188.017 294.709C189.937 292.269 190.897 288.069 190.897 282.109V264.709H192.697V282.109C192.697 294.109 188.537 300.109 180.217 300.109C171.897 300.109 167.737 294.109 167.737 282.109V264.709H169.537ZM223.533 297.709V299.509H203.493V264.709H205.293V297.709H223.533ZM232.186 295.849C230.026 293.009 228.946 288.429 228.946 282.109C228.946 275.789 230.026 271.209 232.186 268.369C234.346 265.529 237.926 264.109 242.926 264.109C247.926 264.109 251.526 265.489 253.726 268.249L252.406 269.449C250.646 267.089 247.486 265.909 242.926 265.909C240.926 265.909 239.246 266.129 237.886 266.569C236.526 266.969 235.266 267.749 234.106 268.909C232.986 270.029 232.146 271.689 231.586 273.889C231.026 276.049 230.746 278.789 230.746 282.109C230.746 285.429 231.026 288.189 231.586 290.389C232.146 292.549 232.986 294.209 234.106 295.369C235.266 296.489 236.526 297.269 237.886 297.709C239.246 298.109 240.926 298.309 242.926 298.309C247.486 298.309 250.646 297.129 252.406 294.769L253.726 295.969C251.526 298.729 247.926 300.109 242.926 300.109C237.926 300.109 234.346 298.689 232.186 295.849ZM265.853 297.709H285.413L273.113 268.729L260.033 299.509H258.113L273.113 264.109L288.113 299.509H265.853V297.709ZM294.958 299.509V264.709H296.758L316.318 296.209V264.709H318.118V299.509H316.318L296.758 267.949V299.509H294.958Z" fill="#A7A9BE"></path><path d="M230.658 23.9374L228.5 20.2442L226.342 23.9374L38.8471 344.752L36.6488 348.513H41.0055H415.995H420.351L418.153 344.752L230.658 23.9374Z" stroke="#A7A9BE" stroke-width="5"></path></svg></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/badge/vulcan-v0.5.1-orange" alt="Total Downloads"></a>

</p>

## Vulcan Hôtel :volcano:

C'est un hôtel comme un autre, dans un volcan.

## Partenaires Premium

![](https://le-campus-numerique.fr/wp-content/uploads/2021/01/ftita-150x150-1.png)

![](https://le-campus-numerique.fr/wp-content/uploads/2021/07/ATLAS.png)

![](https://le-campus-numerique.fr/wp-content/uploads/2021/01/logo-partenaire-2017-rvb-pastille-bleue-png-e1633513985742.png)

![](https://le-campus-numerique.fr/wp-content/uploads/2020/12/soutien-pole-emploi-e1665572481475.png)

## Code de conduite

Faites pas les fous svp :slightly_smiling_face:

## Vulnérabilités de sécurité

Vulnerabilités de sécurité ? :thinking:
On connais pas ça ici :sunglasses:

## Installation

Dans le terminal à l'emplacement qui vous convient
```shell=
git clone git@github.com:Parrots-in-the-Alps/vulcan_hotel.git
cd vulcan_hotel/
npm install
composer install
cp .env.example .env
cd database/
touch db.sqlite
pwd
cd ../
php artisan key:generate
```

Dans le fichier `.env`
> Copié le chemin obtenu avec la commande `pwd`
> Puis le coller en valeur de `DB_DATABASE`
> Assurée vous d'y ajouter le nom du fichier sqlite à la fin du chemin `/db.sqlite`
> Et indiquer que vous utiliser `sqlite` en valeur de `DB_CONNECTION`

Et pour finir dans le terminal
```shell=
php artisan migrate --seed
php artisan serve
```

Ouvrez une nouvelle instance de terminal
```shell=
npm run watch
```
## Mise en place de MailGun

dans le fichier `.env`
>MAIL_DRIVER=mailgun  
>MAIL_HOST=smtp.mailgun.org  
>MAIL_PORT=587  
>MAIL_USERNAME=postmaster@sandboxe686d62be99b45c68c1bdec673e3e3e6.mailgun.org  
>MAIL_PASSWORD=demande à théo :)  
>MAIL_ENCRYPTION=tls  
>MAIL_FROM_ADDRESS=theo.colombel@le-campus-numerique.fr  
>MAIL_FROM_NAME="${APP_NAME}"  

## Envoyé un mail

> 1. on créer l'entité de mail avec la commande > `php artisan make:mail RecapMail`
> 2. dans la fonction construct ont inscrit tout les paramètres nécessaire à notre mail (dans le cas du mail de réservation le seul paramètre attendu est donc la réservation)
>3. dans la fonction build de notre entité de mail on décide quelle vue notre mail va renvoyé avec la fonction view() qui vient rechercher une vue dans le dossier `/vulcan_hotel/resources/views/`. ont peu ici (toujours dans la fonction build()) donner plus d'informations au mail comme son sujet , ses paramètres des pièces jointes etc.
>voici un exemple:

 `return $this->view('email.recapmail')
                    ->subject('séjour dans 1 semaine')
                    ->with([
                        'reservation' => $this->reservation,
                    ])`

>4. ecrire le mail (la vue ) qui se trouve ici `vulcan_hotel/resources/views/email/` dans notre cas ont créer la vue recapmail.blade.php (ne pas oublier les extensions IDIOT !)
>5.  dans cette vue tout les paramètres que nous avons donné dans notre entité de mail sont utilisable, je peux donc ecrire ceci dans mon mail :
` <h1>Merci {{ $reservation->user->name }} pour votre réservation !</h1>`

>6. Maintenant il faut envoyé le mail, cela peut-être fait à différent endroit (dans un controller, dans une commandes avec un cron, à un évenement précis dans l'application (création de compte)) voici un exemple de code pour envoyé le mail que nous venons de créer:
` Mail::to($reservation->user->email)->send(new RecapMail($reservation));`
j'envoie un mail à l'utilisateur qui à fait la réservation et je lui envoie donc un nouveau `RecapMail` avec comme paramètres tout ce que j'ai mis dans la fonction construct de cette entité