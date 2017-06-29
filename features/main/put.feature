Feature: Let's solve that bug

  @createSchema
  Scenario: Update a resource
  Given there is acme fixtures
  When I add "Content-Type" header equal to "application/ld+json"
  And I send a "GET" request to "/acme_file_dummies"
  Then the response should be in JSON

  When I send a "PUT" request to "/acme_file_dummies/1" with body:
  """
      {
        "@id": "/acme_file_dummies/1",
        "name": "This is a test",
        "owner": {
          "id": 1
        }
      }
      """
  Then the response status code should be 200
  And the response should be in JSON
  And the header "Content-Type" should be equal to "application/ld+json; charset=utf-8"
  And the JSON should be equal to:
  """
      {
        "@context": "/contexts/Dummy",
        "@id": "/dummies/1",
        "@type": "Dummy",
        "description": null,
        "dummy": null,
        "dummyBoolean": null,
        "dummyDate": "2015-03-01T10:00:00+00:00",
        "dummyFloat": null,
        "dummyPrice": null,
        "relatedDummy": null,
        "relatedDummies": [],
        "jsonData": [
          {
            "key": "value1"
          },
          {
            "key": "value2"
          }
        ],
        "name_converted": null,
        "id": 1,
        "name": "A nice dummy",
        "alias": null
      }
      """

  @dropSchema
  Scenario: Well...
    When I send a "GET" request to "/dummies/1"
    Then the response status code should be 200
