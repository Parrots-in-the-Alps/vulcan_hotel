import axios from "axios";
import { defineStore } from 'pinia';

export const useWeatherStore = defineStore('weather',{
    state: () =>({
        baseURL_weatherAPI: "https://api.open-meteo.com/v1/forecast?latitude=45.90798311924096&longitude=6.103088334522713&hourly=temperature_2m",
        endURL_weatherAPI: "&timeformat=unixtime&timezone=auto",
        weatherOfTheStay: {},
        options_convertUnixTime: { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' },
    }),
    actions: {
        async weatherOfTheStay(start_date, end_date) {
            const url = this.baseURL_weatherAPI + "&start_date=" + start_date + "&end_date=" + end_date + this.endURL_weatherAPI;
            const response = await axios.get(url, {
                headers: {
                    'Access-Control-Allow-Origin': '*'
                }
            }).then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.log(error);
            });
            console.log(response);
            let result = [];
            for(const dateTime in response.data.hourly.time)
            {
                result.push(this.convertUnixTimestampToDate(dateTime));
            }
            console.log(result);
        },
        convertUnixTimestampToDate(unix_timestamp) {
            return new Date(unix_timestamp * 1000).toLocaleTimeString(navigator.language.replace(new RegExp('-.*'), ''), this.options_convertUnixTime);
        }
    },
})