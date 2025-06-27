# 📦 Backlog – Mini site e-commerce Laravel (avec Bootstrap)

Projet pédagogique à développer à la main, sans package externe, pour comprendre les bases de Laravel, Bootstrap et la structure d'un mini-site e-commerce avec partie admin.

---

## 🎯 Objectif global

Créer un mini site e-commerce :
- Avec affichage des produits et catégories côté public
- Un panier (ajout, affichage, suppression)
- Une partie admin pour gérer produits et catégories (CRUD)
- Authentification pour accéder au back-office
- Interface responsive avec Bootstrap

---

## ✅ 1. Configuration de base

### 🧩 Ticket 1 : Initialiser un projet Laravel
- Créer un nouveau projet avec `laravel new nom_du_projet` ou `composer create-project`
- Configurer `.env`, base de données, et lancer les migrations

### 🧩 Ticket 2 : Installer Bootstrap et Font Awesome
- Intégrer Bootstrap (via CDN ou via Laravel Mix)
- Ajouter Font Awesome (vérifier que les icônes se chargent)

---

## 🧱 2. Base de données & Seed

### 🧩 Ticket 3 : Créer les migrations
- `products` avec `name`, `price`, `description`, `category_id`
- `categories` avec `name`

### 🧩 Ticket 4 : Créer les modèles
- Product → `belongsTo(Category)`
- Category → `hasMany(Products)`

### 🧩 Ticket 5 : Créer des seeders & factories
- Seeder pour créer des catégories
- Factory pour générer des produits avec `faker`
- Lier chaque produit à une catégorie

---

## 🧭 3. Affichage public (front office)

### 🧩 Ticket 6 : Créer un layout Blade global
- Inclure le header (menu), footer, section `@yield('content')`
- Afficher le nom du site à gauche, les liens `Accueil`, `Catégories`, `Connexion` à droite + icône Panier

### 🧩 Ticket 7 : Afficher tous les produits
- Route `GET /`
- Vue avec une grille de cartes Bootstrap
- Afficher nom, prix, lien vers le détail

### 🧩 Ticket 8 : Afficher le détail d’un produit
- Route `GET /product/{product}`
- Afficher image (placeholder ok), nom, description, prix, bouton "Ajouter au panier"

### 🧩 Ticket 9 : Afficher toutes les catégories
- Route `GET /categories`
- Liste des catégories avec lien vers page filtrée

### 🧩 Ticket 10 : Afficher les produits d’une catégorie
- Route `GET /category/{id}`
- Même vue que la page produit, mais filtrée

---

## 🛒 4. Gestion du panier

### 🧩 Ticket 11 : Ajouter un produit au panier
- Stocker les données en session (`session()->put('cart', [...])`)
- Créer une route `POST /cart/add/{id}`

### 🧩 Ticket 12 : Afficher le contenu du panier
- Route `GET /cart`
- Afficher liste des produits, total général

### 🧩 Ticket 13 : Supprimer un article du panier
- Bouton "Retirer" avec suppression via route

### 🧩 Ticket 14 : Modifier la quantité d’un article
- Ajouter un champ pour modifier la quantité
- Recalculer les totaux automatiquement

---

## 🔐 5. Authentification & Admin

### 🧩 Ticket 15 : Activer l'auth avec `php artisan make:auth` ou Breeze
- Créer page de connexion
- Limiter l’accès au back-office avec `auth` middleware

### 🧩 Ticket 16 : Créer un tableau de bord admin
- Dashboard avec lien vers :
  - Liste des produits
  - Liste des catégories
- Afficher :
  - Nombre total de produits
  - Montant total potentiel du stock
  - Nombre de catégories

---

## 🛠 6. CRUD – Admin

### 🧩 Ticket 17 : CRUD Produits
- Créer les routes `admin/products`
- Formulaires avec validation
- Ajout, édition, suppression

### 🧩 Ticket 18 : CRUD Catégories
- Même logique que pour les produits
- Attention : empêcher la suppression d'une catégorie liée à des produits

---

## 🎨 7. Bonus & améliorations

### 🧩 Ticket 19 : Upload d’image produit
- Ajouter champ `image` dans la table `products`
- Stocker dans `storage/app/public` et afficher avec `asset('storage/…')`

### 🧩 Ticket 20 : Ajouter des messages flash
- `session()->flash('success', 'Produit ajouté !')`
- Afficher dans les vues avec alertes Bootstrap

### 🧩 Ticket 21 : Ajouter une pagination aux listes
- Utiliser `->paginate(10)` dans les contrôleurs
- Afficher la navigation Bootstrap avec `{{ $products->links() }}`

---

## 📦 8. Déploiement et tests

### 🧩 Ticket 22 : Tester les routes protégées
- S’assurer qu’un non-connecté ne peut pas accéder au back-office
- Tester le panier sans être connecté

### 🧩 Ticket 23 : Préparer le projet pour évaluation
- Base de données propre + seed
- Routes fonctionnelles
- README avec instructions d'installation

---

