# Eloquent Search
Easy way to search for a keyword in all your eloquent models at once.

>**Note:This package does not support any search driver like ElasticSearch or Agolia**

<!-- TOC -->

- [Eloquent Search](#eloquent-search)
    - [1. Installation](#1-installation)
    - [2. Usage](#2-usage)
    - [3. Security Vulnerabilities](#3-security-vulnerabilities)
    - [4. License](#4-license)

<!-- /TOC -->

## 1. Installation 
The recommended way to install eloquent search is by using composer.

Run:
```
composer require ac-developers/eloquent-search
```

## 2. Usage
Implement the `EloquentSearchInterface` in your eloquent model and then also use the `EloquentSearchTrait`, this will require you to implement a `searchColumns` method which should return an array of the columns you would want to search through in the model.

Then in your controller you would use the the `EloquentSearch` class to find what your looking for. The class takes 5 arguments, but the most important is the first which is the `keyword` you want to search for and then the second is an array of all the `eloquent model` classes you would like to search through.

The `EloquentSearch` class will merge and return a paginated collection of all the models searched through using the `Illuminate\Pagination\LengthAwarePaginator` class. 

## 3. Security Vulnerabilities
If you discover a security vulnerability within Laravel Form Processor, please send an e-mail to Anitche Chisom via anitchec.dev@gmail.com. All security vulnerabilities will be promptly addressed.

## 4. License
The Eloquent Search is open-sourced software licensed under the [MIT](LICENSE) license.