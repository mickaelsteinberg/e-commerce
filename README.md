## Installation du projet Amazom

### Prérequis

- PHP >= 8.2
- Composer
- MySQL ou MariaDB
- [Git](https://git-scm.com/)
- (Optionnel) [Laravel Installer](https://laravel.com/docs/10.x/installation)

### Étapes

1. **Cloner le dépôt**
   ```sh
   git clone <url-du-repo>
   cd amazom
   ```

2. **Installer les dépendances PHP**
   ```sh
   composer install
   ```

3. **Copier le fichier d’environnement**
   ```sh
   cp .env.example .env
   ```
   *(ou adapte le fichier `.env` selon ta configuration)*

4. **Générer la clé d’application**
   ```sh
   php artisan key:generate
   ```

5. **Configurer la base de données**
   - Modifie les variables `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` dans `.env` selon ta config locale.

6. **Lancer les migrations et seeders**
   ```sh
   php artisan migrate --seed
   ```

7. **Créer le lien de stockage public**
   ```sh
   php artisan storage:link
   ```

8. **Compiler les assets front**
   ```sh
   npm run dev
   ```

9. **Démarrer le serveur de développement**
    ```sh
    php artisan serve
    ```

10. **Accéder à l’application**
    - Ouvre [http://localhost:8000](http://localhost:8000) dans ton navigateur.

---

**Comptes de test :**
- Admin : `admin@email.com` / `1234`
- (Voir DatabaseSeeder pour d’autres comptes)

---

**Remarque :**  
Si tu rencontres des problèmes d’upload, vérifie les droits sur le dossier `storage` et la configuration de taille d’upload dans ton `php.ini`.