# Laravel Blog

## Installation

```
git clone XXX
cd blog
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
```


# Aufgaben

1. Fehler auf admin/posts lösen?
    - Woher kam der Fehler?
    - => DB Seeder referenzierte auf eine User ID 100, welche nicht
    existiert. (Foreign Constraints hätten das verhindern können.). Alternativ
    hätte man mit z.B. `optional($post->user)->name` den Namen des Users anzeigen können.
2. Der Admin soll bei Posts festlegen können wer der Autor ist.
    - => Feld hinzugefügt, bei Erstellung ist der eingeloggte User ausgewählt. Nicht-admins können das Feld nicht ändern.
3. Jeden 1. des Monats soll das System einen Post mit Titel "Zusammenfassung (Monat im Format mm.yyyy)" im Hintergrund anlegen. Autor ist der Admin.
    - => Es gibt nun das Kommando `php artisan posts:summary` welches die Zusammenfassung erzeugt. Das Kommando wurde mit dem Scheduler auf den ersten des Monats gelegt.
4. Nach dem erstellen eines Posts soll der Admin eine Notification bekommen. Titel: "Neuer Post". Inhalt: Link zum Post.


