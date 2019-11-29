/**
 * Get the Orthodox Easter Sunday.
 *
 * @param  integer year
 * @return Moment
 */
function orthodoxEasterSunday(year)
{
    d = (year%19*19+15)%30;
    e = (year%4*2+year%7*4-d+34)%7+d+127;
    month = Math.floor(e/31);
    a = e%31 + 1 + (month > 4);

    return moment(new Date(year, (month-1), a));
}

/**
 * Get holidays.
 *
 * @param  integer year
 * @param  string dateFormat
 * @return array
 */
function getHolidays(year, dateFormat = "YYYY-MM-DD")
{
    January1 = year + "-01-01";
    January1 = year + "-01-01";
    January2 = year + "-01-02";
    January7 = year + "-01-07";
    February15 = year + "-02-15";
    February16 = year + "-02-16";
    May1 = year + "-05-01";
    May2 = year + "-05-02";
    November11 = year + "-11-11";
    GoodFriday = orthodoxEasterSunday(year).subtract(2, 'd').format(dateFormat);
    EasterMonday = orthodoxEasterSunday(year).add(1, 'd').format(dateFormat);

    return [January1, January2, January7, February15, February16,
    May1, May2, November11, GoodFriday, EasterMonday];
}

/**
 * Determine if a date is Sunday.
 *
 * @param  JS  date
 * @return boolean
 */
function isSunday(date)
{
    return date.getDay() == 0;
}

/**
 * Determine if a value is in an array.
 *
 * @param  mixed  value
 * @param  array  array
 * @return boolean
 */
function isInArray(value, array)
{
    return array.indexOf(value) !== -1
}