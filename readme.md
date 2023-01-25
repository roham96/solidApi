# Task 1:

-  you can call public route
```sh 
localhost:8000/task1/?q=546546545*231231
```


# Task 2:

### I think this query works 


matrix

[ [ "1", "4" ], [ "2", "5" ], [ "3", "6" ] ]

[ [ "a", "d" ], [ "b", "e" ], [ "c", "f" ] ]

[ [ "134", "862" ], [ "111", "197" ] ]

```sh
SELECT
    array_agg(v ORDER BY j) matrix
        FROM 
            (
            SELECT r_n,
                   j,
                   array_agg(v ORDER BY i) AS v
                FROM 
                    (
                     SELECT r_n,
                       i,
                       j,
                       matrix[i][j] AS v
                       FROM
                        (
                        SELECT generate_subscripts(matrix, 2) j,
                               q.*
                            FROM 
                                ( SELECT ROW_NUMBER() OVER () AS r_n,
                                generate_subscripts(matrix, 1) AS i,
                                matrix FROM matrices ) q  ) r  ) s
                                    GROUP BY r_n, j ) t
                             GROUP BY r_n
ORDER BY r_n;
```


# Task 3


- laravel app using jwt authentication
- solid principle rest api
- run using docker



| typing ...