a<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> | POS Foundations</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f4f6f8; color: #222; }
        header { background: #1f2d3d; color: #fff; padding: 1rem 2rem; }
        header h1 { font-size: 1.3rem; display: inline-block; margin-right: 2rem; }
        nav { display: inline-block; }
        nav a {
            color: #cdd6e0;
            text-decoration: none;
            margin-right: 1.25rem;
            font-size: 0.95rem;
        }
        nav a:hover, nav a.active { color: #fff; text-decoration: underline; }
        main { max-width: 900px; margin: 2rem auto; padding: 0 1.5rem; }
        h2 { margin-bottom: 1rem; color: #1f2d3d; }
        table { width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        th, td { text-align: left; padding: 0.75rem 1rem; border-bottom: 1px solid #e2e6ea; }
        th { background: #1f2d3d; color: #fff; }
        tr:hover { background: #f0f3f7; }
        .card { background: #fff; padding: 1.5rem; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .toolbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; }
.toolbar h2 { margin-bottom: 0; }
.btn { display: inline-block; background: #2f6fed; color: #fff; border: 0; padding: 0.55rem 1.1rem; border-radius: 4px; font-size: 0.95rem; text-decoration: none; cursor: pointer; }
.btn:hover { background: #1f58c9; }
.btn-secondary { background: #8a94a3; }
.btn-secondary:hover { background: #6f7886; }
.form-group { margin-bottom: 1rem; }
label { display: block; font-weight: 600; margin-bottom: 0.35rem; }
input[type=text], input[type=email], input[type=file], select { width: 100%; padding: 0.55rem 0.7rem; border: 1px solid #c4ccd6; border-radius: 4px; font-size: 0.95rem; background: #fff; }
.has-error input, .has-error select { border-color: #c62828; }
.error { color: #c62828; font-size: 0.85rem; margin-top: 0.3rem; }
.actions { margin-top: 1.25rem; }
.avatar { width: 48px; height: 48px; border-radius: 50%; object-fit: cover; background: #e2e6ea; display: block; }
.avatar-lg { width: 96px; height: 96px; border-radius: 50%; object-fit: cover; margin-bottom: 0.5rem; display: block; }
.hint { color: #8a94a3; font-size: 0.8rem; margin-top: 0.25rem; }
        footer { text-align: center; padding: 1.5rem; color: #8a94a3; font-size: 0.85rem; }
    </style>
</head>
<body>
<header>
    <h1>POS Foundations</h1>
    <nav>
        <a href="<?= site_url('/') ?>">Home</a>
        <a href="<?= site_url('about') ?>">About</a>
        <a href="<?= site_url('customers') ?>">Customer Accounts</a>
        <a href="<?= site_url('users') ?>">User Accounts</a>
    </nav>
</header>
<main>
