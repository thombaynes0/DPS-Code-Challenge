<html>
    <head>PHP DPS CODE CHALLENGE</head>
    <body>
        <?php

            $people = '{
                "data": [{
                    "first_name": "aaron",
                    "last_name": "heath",
                    "age": 34,
                    "email": "aaron.heath@dps.com.au",
                    "secret": "VXNlIHRoaXMgc2VjcmV0IHBocmFzZSBzb21ld2hlaaagaW4geW91ciBjb2RlJ3MgY29tbWVudHM="
                }, {
                    "first_name": "michelle",
                    "last_name": "beech",
                    "age": 21,
                    "email": "michelle.beech@dps.com.au",
                    "secret": "YWxidXF1ZXJxdWZzIHNub3JrZWwu"
                }]
            }';

            //Decode json to array.
            $people_decoded = json_decode($people, true);
            $data = $people_decoded['data'];

            //Instantiate email array.
            $email_array = [];

            foreach ($data as $key => $val) {
                //Add a full name field to each record.
                $data[$key]['name'] = $data[$key]['first_name'] . " " . $data[$key]['last_name'];

                //Push each email to $email_array.
                $email = $val['email'];
                array_push($email_array, $email);
            }

            //Sort array by age descending.
            array_multisort(array_column($data, 'age'), SORT_DESC, $data);

            $people_array = array("data" => $data);
            
            //Create comma-separated list of email addresses.
            $emails = implode(', ', $email_array);

            echo "<br><br><b>New People Array</b><br>";
            var_dump($people_array);
            echo "<br><br><b>Email List</b><br>";
            echo $emails;
        ?>
    </body>
</html>
