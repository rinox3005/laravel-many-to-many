# Laravel Boolfolio - Project Technology

Utilizzando il codice della repo laravel-one-to-many come base aggiungere una nuova entità Technology.

Questa entità rappresenta le tecnologie utilizzate ed è in relazione many to many con i progetti.

## Milestone 1

-   Creare la migration per la tabella technologies.

-   Creare il model Technology.

## Milestone 2

-   Creare la migration per la tabella pivot project_technology.

-   Aggiungere ai model Technology e Project i metodi per definire la relazione many to many.

## Milestone 3

Visualizzare nella pagina di dettaglio di un progetto le tecnologie utilizzate, se presenti.

# Bonus 1

Creare il seeder per il model Technology.

# Bonus 2

Aggiungere le operazioni CRUD per il model Technology, in modo da gestire le tecnologie utilizzate nei progetti direttamente dal pannello di amministrazione.

# Bonus 3

-   Permettere all’utente di associare le tecnologie nella pagina di creazione e modifica di un progetto.

-   Gestire il salvataggio dell’associazione progetto-tecnologie con opportune regole di validazione.

-   Eliminare opportunamente le relazioni alla cancellazione del progetto/technology.
