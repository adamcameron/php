# feature/testPrs4.feature
  Feature: PSR-4 testing page
  As a user of my behattest web site
  In order to check a baseline web test
  I need to be able to check content of testPsr4.php

Scenario: Getting the page
  Given I am on "/testPsr4.php"
  Then I should see "RAN WITH NO ERRORS"
