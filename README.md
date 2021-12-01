<p align="center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="gray" style="height:80px;width:80px;vertical-align:middle;">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
</svg>
<span style="color:gray;font-weight:bold;font-size:30px">Sports</span>
</p>

# About Sports

Sports is a platform designed to register every sport event.

# Data model
## Sports
> TODO
**Sports** are divided into **Disciplines** (one of them can be the "default" one).

> TODO
**Disciplines** are divided into **Events** (one of them can be the "default" one).

## Championships
**Championships** are divided into **Editions**.

> TODO
An **Edition** has one or more related **Disciplines** and **Events** (**EditionDisciplines** and **EditionEvents**).

> * NOTE: As a result, a Championship is related with its Sport via Edition, EditionDiscipline and Discipline.
> * TODO: There must be an easy way to relate simple Championships with its Sport ("La Liga" => "football")

> TODO
Each **EditionEvent** is divided into **Rounds**.

> TODO
In each **Round** there are **Games**.

## Participants
> /*TODO*/