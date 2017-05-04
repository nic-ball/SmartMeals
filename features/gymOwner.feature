Feature: Gym owners can love or loathe meals from the menu
  In order to love or loathe meals
  As a gym owner
  I need to be able to add/remove meals to/from the love/loathe it list
  I need to be able to star love it meals
  And I need to not receive samples of meals that are on my love/loathe it lists

  Rules:
  - A gym owner should be signed up
  - Meals can be loved
  - Love it meals can be starred
  - Meals can be loathed
  - Loathed meals cannot be starred
  - Meals added to either love it or loathe must not be sent to gym owner

  Scenario: Gym owner loves meal
  Given there is a gym owner with the email address "nic@nic.com"
  And there is a meal with the menu number 17
  And "nic@nic.com" has no love it meals with the menu number 17
  When "nic@nic.com" loves a meal with the menu number 17
  Then "nic@nic.com" has a love it meal with the menu number 17

  Scenario: Gym owner attempts to love a previously loved meal
  Given there is a gym owner with the email address "nic@nic.com"
  And there is a meal with the menu number 17
  And "nic@nic.com" has a love it meal with the menu number 17
  When "nic@nic.com" attempts to love the meal with the menu number 17
  Then "nic@nic.com" should still have a love it meal with the menu number 17

  Scenario: Gym owner stars a Loved meal
  Given there is a gym owner with the email address "nic@nic.com"
  And there is a meal with the menu number 17
  And "nic@nic.com" has a love it meal with the menu number 17
  When "nic@nic.com" stars the meal with menu number 17
  Then "nic@nic.com" should have a starred love it meal with the menu number 17

  Scenario: Gym owner unstars a meal
  Given there is a gym owner with the email address "nic@nic.com"
  And there is a meal with the menu number 17
  And "nic@nic.com" has a love it meal with the menu number 17
  And "nic@nic.com" has starred a loved meal with the menu number 17
  When "nic@nic.com" unstars the meal with menu number 17
  Then "nic@nic.com" should not have starred a loved meal with the menu number 17

  Scenario: Gym owner unloves a meal
  Given there is a gym owner with the email address "nic@nic.com"
  And there is a meal with the menu number 17
  And "nic@nic.com" has a love it meal with the menu number 17
  When "nic@nic.com" unloves the meal with the menu number 17
  Then "nic@nic.com" should not have a love it meal with the menu number 17

  Scenario: Gym owner Loathes a meal
  Given there is a gym owner with the email address "nic@nic.com"
  And there is a meal with the menu number 34
  And "nic@nic.com" has no loath it meals with the menu number 34
  When "nic@nic.com" attempts to loathe the meal with the menu number 34
  Then "nic@nic.com" should have a loathed meal with the menu number 34

  Scenario: Gym owner attempts to loathe a previously loathed meal
  Given there is a gym owner with the email address "nic@nic.com"
  And there is a meal with the menu number 34
  And "nic@nic.com" has a loathed meal with the menu number 34
  When "nic@nic.com" attempts to loathe the meal with the menu number 34
  Then "nic@nic.com" should have a loathed meal with the menu number 34

  Scenario: Gym owner attempts to star loathed meal
  Given there is a gym owner with the email address "nic@nic.com"
  And there is a meal with the menu number 34
  When "nic@nic.com" attempts to star a loathed meal with the menu number 34
  Then "nic@nic.com" should not have a starred loathe it meal with the menu number 34

  Scenario: Gym owner unloathes a meal
  Given there is a gym owner with the email address "nic@nic.com"
  And there is a meal with the menu number 34
  And "nic@nic.com" has a loathed meal with the menu number 34
  When "nic@nic.com" unloathes the meal with the menu number 34
  Then "nic@nic.com" should not have a loathed meal with the menu number 34

  Scenario: Sending a meal sample to a gym owner
  Given there is a gym owner with the email address "nic@nic.com"
  And there is a meal with the menu number 59
  And menu number 59 is not in "nic@nic.com" love it or loathe it list
  Then "nic@nic.com" should be sent a sample of the meal with menu number 59

  Scenario: Trying to send a sample that a gym owner has already received
  Given there is a gym owner with the email address "nic@nic.com"
  And there is a meal with the menu number 86
  And menu number 86 has not been sent to "nic@nic.com" before
  Then "nic@nic.com" should not be sent a sample of menu number 86