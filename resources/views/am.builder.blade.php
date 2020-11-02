<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
@php

    $vari=  {
                "type": "serial",
                "categoryField": "category",
                "startDuration": 1,
                "handDrawn": false,
                "theme": "chalk",
                "categoryAxis": {
                    "gridPosition": "start"
                },
                "trendLines": [],
                "graphs": [
                    {
                        "balloonText": "[[title]] of [[category]]:[[value]]",
                        "bullet": "round",
                        "id": "AmGraph-1",
                        "title": "graph 1",
                        "valueField": "column-1"
                    }
                ],
                "guides": [],
                "valueAxes": [
                    {
                        "id": "ValueAxis-1",
                        "title": "Axis title"
                    }
                ],
                "allLabels": [],
                "balloon": {},
                "legend": {
                    "enabled": true,
                    "tabIndex": -2,
                    "useGraphSettings": true
                },
                "titles": [
                    {
                        "id": "Title-1",
                        "size": 15,
                        "text": "Chart Title"
                    }
                ],
                "dataProvider": [
                    {
                        "category": "category 1",
                        "column-1": 8
                    },
                    {
                        "category": "category 2",
                        "column-1": 6
                    },
                    {
                        "category": "category 3",
                        "column-1": 2
                    },
                    {
                        "category": "category 4",
                        "column-1": 1
                    },
                    {
                        "category": "category 5",
                        "column-1": 2
                    },
                    {
                        "category": "category 6",
                        "column-1": 3
                    },
                    {
                        "category": "category 7",
                        "column-1": 6
                    },
                    {
                        "category": "category 8",
                        "column-1": "3"
                    },
                    {
                        "category": "category 9",
                        "column-1": "8.5"
                    },
                    {
                        "category": "category 10",
                        "column-1": "0.1"
                    }
                ]
            }

return $vari;

@endphp




</body>
</html>