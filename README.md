# Appointment Booking Api

## Installation Instructions

1. copy .env-example to .env replace the following variable
    1. db_host &rarr; db 
    2. db_database &rarr; appointment_booking
    3. db_username & db_password &rarr; to your liking
2. `docker-compose up -d`
3. `docker-compose exec app composer install`
4. `docker-compose exec app php artisan key:generate`
5. `docker-compose exec app php artisan config:cache`
6. `docker-compose exec db bash`
7. `mysql -u root -p`
8. `GRANT ALL ON appointment_booking.* TO 'your_user'@'%' IDENTIFIED BY 'your_password';`
    1. Where `your_user` and `your_password` are the ones you chose for `db_user` and `db_password`
     in the .env file
9. `FLUSH PRIVILEGES;`
10. Exit that console back to root project
11. `docker-compose exec app bash`
12. `php artisan migrate:refresh --seed`
13. Application will be located at `http://localhost`

## API Entities & Requests

### Clinic
1. [*GET*] `base_url`/clinics &rarr; shows information about the clinic   
    1. Shows the information on the clinic that exists  

Note: by default `base_url` is just `http://localhost`
    
### Patient
1. [*GET*] `base_url`/patients &rarr; shows information about all the patients existing
2. [*GET*] `base_url`/patients/{uid} &rarr; shows information on a single patient
    1. {uid} for each patient is their first name concatenated with their last name (no spaces)

### Provider
1. [*GET*] `base_url`/providers?searchQuery={searchQuery} &rarr; shows information about all the providers existing
    1. Optional param: `searchQuery` &rarr; will show you all providers who's full name matches the search query
2. [*GET*] `base_url`/providers/{uid} &rarr; shows information on a single provider
    1. {uid} for each provider is their first name concatenated with their last name (no spaces)

### TimeSlot
1. [*GET*] `base_url`/timeslots &rarr; shows information about all the patients existing
2. [*GET*] `base_url`/timeslots/{id} &rarr; shows information on a single timeslot

### Appointment
1. [*GET*] `base_url`/appointments &rarr; shows information about all the appointments existing

Note: an appointment is just a timeslot which has a patientId (is booked)

### Availability
1. [*GET*] `base_url`/availabilities?startDate={startDate}&endDate={endDate} &rarr; shows information about all 
the availabilities existing which has a startDateTime within the range specified
    1. Optional param: `startDate` &rarr; will default to a timestamp of 0 (no restriction on startDate)
    1. Optional param: `endDate` &rarr; will default to a timestamp of PHP_INT_MAX (no restriction on endDate)
2. [*POST*] `base_url`/availabilities/book &rarr; book an availability for a patient
    1. Required param: `patientId` &rarr; patient to book for 
    2. Required param: `availabilityId` &rarr; availability to book for 
    
Note: an availability is just a timeslot which does not have a patientId (is not booked) 


    
