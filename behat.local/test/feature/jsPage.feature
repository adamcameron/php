# feature/jsPage.feature
  Feature: JS testing page
  As a user of my behattest web site
  In order to check a baseline web test
  I need to be able to check content of /index.php/ajax/

Scenario: Getting the page
  Given I am on "/index.php/ajax/"
  Then I should see "This is content loaded via mark-up"

@javascript
Scenario: Getting the JS content
  Given I am on "/index.php/ajax/"
  And I wait for the JavaScript content to load
  Then I should see "This is content loaded via mark-up"


@javascript
Scenario: Getting the AJAX content
  Given I am on "/index.php/ajax/"
  And I wait for the AJAX content to load
  Then I should see "This is content loaded via AJAX request" in the "#ajaxContent" element
