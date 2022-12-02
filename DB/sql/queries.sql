/* Profile */
SELECT
    u.firstName,
    u.lastName,
    u.email,
    u.imagePath,
    a.streetName,
    a.streetNumber,
    a.streetNumber,
    pc.cityName,
    pc.country
FROM user u, address a, postalcode pc
WHERE u.addressID = a.addressID
  AND a.postalCodeID = pc.postalCodeID

