<?php 
if(!session_id()){ 
    session_start(); 
}  

define('PAYPAL_SANDBOX', TRUE); //TRUE=Sandbox | FALSE=Production 
define('PAYPAL_SANDBOX_CLIENT_ID', 'AQ-N6Obs0vtRnmCMdSY9ELI4nQkiyTVZdGT7zxB66_P3k9L_RNUUQbLrXquY0cdrq6reCfkFdV2rmePm'); 
define('PAYPAL_SANDBOX_CLIENT_SECRET', 'EI11Q_REg4CLjGHMwj1ypnKwsIfi8bH5AjQbymIwoO5oyzYGZxLg1Jev_KCEpQGc1GWLAO1gfCiW3wFK'); 
define('PAYPAL_PROD_CLIENT_ID', 'Ac9eyA2QLmO4vT6q3qP8IJYgyljdML1rc0M2HhgDGhR6P4IhJsan48ZH5MfCjdRdmvw_UF8zoU_LmZju'); 
define('PAYPAL_PROD_CLIENT_SECRET', 'EFfD-07Q9buS7iicSEUtr07GENcEGeHgwoghNQM3Tq2zqJX3jCpfKFApOyEDz1iNzMXMi0_MvWP_jrlH'); 
 
define('CURRENCY', 'GBP');  
 