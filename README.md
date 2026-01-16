# 🧑‍💼 TalentHub – Authentification Multi-Rôles (MVC sans Framework)

## 📌 Contexte du projet

TalentHub est une plateforme de recrutement en cours de développement visant à connecter candidats et recruteurs de manière simple et efficace.

Avant d’implémenter les fonctionnalités métier (offres d’emploi, candidatures, messagerie), l’équipe technique doit mettre en place un système d’authentification multi-rôles solide, sécurisé et réutilisable.

🎯 **Objectif du projet**  
Construire un socle technique d’authentification basé sur une architecture MVC développée sans framework, qui servira de fondation à toutes les futures fonctionnalités de la plateforme.

---

## 🧠 Objectifs pédagogiques

- Comprendre et implémenter une architecture MVC « fait maison »
- Mettre en place un système de routage centralisé
- Séparer clairement Models, Controllers et Views
- Gérer une authentification multi-rôles
- Sécuriser l’accès aux routes selon le rôle
- Comprendre les avantages du MVC face au procédural

---

## 👥 Rôles du système

### 👤 Candidate
- Inscription
- Connexion
- Dashboard candidat

### 🏢 Recruiter
- Inscription
- Connexion
- Dashboard recruteur

### 🛡️ Admin
- Connexion uniquement
- Back-office admin

Chaque rôle possède ses propres routes, contrôleurs et vues protégées.

---

## ⚙️ Fonctionnalités

### 🔐 Authentification
- Inscription (Candidate, Recruiter)
- Connexion (tous les rôles)
- Sessions PHP
- Déconnexion
- Hashage des mots de passe (`password_hash()`)

### 🔑 Gestion des rôles
- Attribution automatique
- Stockage en session
- Redirection vers `/{role}/dashboard`

### 🚫 Protection des routes
- Routes publiques : `/`, `/login`, `/register`
- Routes protégées par rôle
- Redirection vers login ou page 403 si accès refusé

---

## 🛠️ Règles techniques

- Architecture MVC obligatoire
- Point d’entrée unique : `public/index.php`
- Aucun accès direct aux fichiers
- PDO + requêtes préparées
- Aucune logique métier dans les vues

---

## 🔐 Sécurité

- Mots de passe hashés
- Vérification de session
- Validation des entrées
- Messages d’erreur sécurisés

---

## 🏁 Résultat attendu

- Architecture MVC claire et extensible
- Ajout facile de nouveaux rôles
- Code maintenable et réutilisable

---

📌 **Projet pédagogique – TalentHub**
