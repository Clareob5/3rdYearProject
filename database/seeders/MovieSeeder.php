<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $movie = new Movie();
      $movie->title = "Lost";
      $movie->director = "Steven Spielberg";
      $movie->cast = "Jennifer Lawrence, Matt Damon, Adam Sandler";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2019;
      $movie->rating = 6.7;
      $movie->duration = "190 min";
      $movie->genre = "Action";
      $movie->description = "Before planning an awesome wedding for his grandfather, a polar bear king must take back a stolen artifact from an evil archaeologist first.";
      $movie->cover = "Lost_in_Translation.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Found";
      $movie->director = "Steven Spielberg";
      $movie->cast = "Jennifer Lawrence, Matt Damon, Adam Sandler";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2019;
      $movie->rating = 7.45;
      $movie->duration = "190 min";
      $movie->genre = "Drama";
      $movie->description = "Before planning an awesome wedding for his grandfather, a polar bear king must take back a stolen artifact from an evil archaeologist first.";
      $movie->cover = "image2.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Destination";
      $movie->director = "Steven Spielberg";
      $movie->cast = "Jennifer Lawrence, Matt Damon, Adam Sandler";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2019;
      $movie->rating = 6.4;
      $movie->duration = "190 min";
      $movie->genre = "Horror";
      $movie->description = "Before planning an awesome wedding for his grandfather, a polar bear king must take back a stolen artifact from an evil archaeologist first.";
      $movie->cover = "image3.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Roadtrip";
      $movie->director = "Steven Spielberg";
      $movie->cast = "Jennifer Lawrence, Matt Damon, Adam Sandler";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2019;
      $movie->rating = 8.9;
      $movie->duration = "190 min";
      $movie->genre = "Comedy";
      $movie->description = "Before planning an awesome wedding for his grandfather, a polar bear king must take back a stolen artifact from an evil archaeologist first.";
      $movie->cover = "image4.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "1917";
      $movie->director = "Sam Mendes";
      $movie->cast = "Richard Madden, Matt Damon, Adam Sandler";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2019;
      $movie->rating = 7.5;
      $movie->duration = "190 min";
      $movie->genre = "Action";
      $movie->description = "During World War I, two British soldiers -- Lance Cpl. Schofield and Lance Cpl. Blake -- receive seemingly impossible orders.";
      $movie->cover = "1917.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Jojo Rabbit";
      $movie->director = "Taika Waititi";
      $movie->cast = "Scarlett Johansson, Roman Griffin Davis";
      $movie->country = "New Zealand";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2020;
      $movie->rating = 8.7;
      $movie->duration = "108 min";
      $movie->genre = "Comedy";
      $movie->description = "Hitler Youth cadet Jojo Betzler firmly believes in the ideals of Nazism manifested by his imaginary friend, Adolf Hitler. ";
      $movie->cover = "image2.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "1917";
      $movie->director = "Sam Mendes";
      $movie->cast = "Richard Madden, Matt Damon, Adam Sandler";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2019;
      $movie->rating = 4.7;
      $movie->duration = "190 min";
      $movie->genre = "Action";
      $movie->description = "During World War I, two British soldiers -- Lance Cpl. Schofield and Lance Cpl. Blake -- receive seemingly impossible orders.";
      $movie->cover = "1917.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Norm of the North: King Sized Adventure";
      $movie->director = "Richard Finn";
      $movie->cast = "Alan Marriott, Andrew Toth, Brian Dobson, Cole Howard, Jennifer Cameron, Jonathan Holmes, Lee Tockar, Lisa Durupt, Maya Kay, Michael Dobson";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2019;
      $movie->rating = 5.6;
      $movie->duration = "90 min";
      $movie->genre = "Comedy";
      $movie->description = "Before planning an awesome wedding for his grandfather, a polar bear king must take back a stolen artifact from an evil archaeologist first.	";
      $movie->cover = "norm_north.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Jandino: Whatever it Takes";
      $movie->director = "Jandino Asporaat";
      $movie->cast = "Jandino Asporaat";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2016;
      $movie->rating = 8.3;
      $movie->duration = "94 min";
      $movie->genre = "Stand-Up Comedy";
      $movie->description = "Jandino Asporaat riffs on the challenges of raising kids and serenades the audience with a rousing rendition of Sex on Fire in his comedy show.";
      $movie->cover = "jandino.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "#realityhigh";
      $movie->director = "Fernando Lebrija";
      $movie->cast = "Nesta Cooper, Kate Walsh, John Michael Higgins, Keith Powers, Alicia Sanz, Jake Borelli, Kid Ink, Yousef Erakat, Rebekah Graf, Anne Winters, Peter Gilroy, Patrick Davis";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2017;
      $movie->rating = 5.45;
      $movie->duration = "99 min";
      $movie->genre = "Comedy";
      $movie->description = "When nerdy high schooler Dani finally attracts the interest of her longtime crush, she lands in the cross hairs of his ex, a social media celebrity. ";
      $movie->cover = "reality.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Automata";
      $movie->director = "Gabe IbÃez";
      $movie->cast = "Antonio Banderas, Dylan McDermott, Melanie Griffith, Birgitte Hjort SÃ¸rensen, Robert Forster, Christa Campbell, Tim McInnerny, Andy Nyman, David Ryall";
      $movie->country = "Bulgaria";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2020;
      $movie->rating = 5.6;
      $movie->duration = "108 min";
      $movie->genre = "Comedy";
      $movie->description = "Hitler Youth cadet Jojo Betzler firmly believes in the ideals of Nazism manifested by his imaginary friend, Adolf Hitler. ";
      $movie->cover = "automata.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Good People";
      $movie->director = "Henrik Ruben Genz";
      $movie->cast = "James Franco, Kate Hudson, Tom Wilkinson, Omar Sy, Sam Spruell, Anna Friel, Thomas Arnold, Oliver Dimsdale, Diana Hardcastle";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2014;
      $movie->rating = 9;
      $movie->duration = "90 min";
      $movie->genre = "Action & Adventure";
      $movie->description = "A struggling couple can't believe their luck when they find a stash of money in the apartment of a neighbor who was recently murdered. ";
      $movie->cover = "good_people.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Kidnapping Mr. Heineken";
      $movie->director = "Daniel Alfredson";
      $movie->cast = "Antonio Banderas, Dylan McDermott, Melanie Griffith, Birgitte Hjort SÃ¸rensen, Robert Forster, Christa Campbell, Tim McInnerny, Andy Nyman, David Ryall";
      $movie->country = "Netherlands";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2015;
      $movie->rating = 9.5;
      $movie->duration = "95 min";
      $movie->genre = "Action & Adventure";
      $movie->description = "When beer magnate Alfred \"Freddy\" Heineken is kidnapped in 1983, his abductors make the largest ransom demand in history.";
      $movie->cover = "kidnapping.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Krish Trish and Baltiboy";
      $movie->director = "Gabe IbÃez";
      $movie->cast = "Damandeep Singh Baggan, Smita Malhotra, Baba Sehgal";
      $movie->country = "Bulgaria";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2009;
      $movie->rating = 6.3;
      $movie->duration = "58 min";
      $movie->genre = "Children & Family";
      $movie->description = "A team of minstrels, including a monkey, cat and donkey, narrate folktales from the Indian regions of Rajasthan, Kerala and Punjab.";
      $movie->cover = "krish.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Next Gen";
      $movie->director = "Kevin R. Adams";
      $movie->cast = "John Krasinski, Charlyne Yi, Jason Sudeikis, Michael PeÃ±a, David Cross, Constance Wu";
      $movie->country = "China";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2018;
      $movie->rating = 6.8;
      $movie->duration = "106 min";
      $movie->genre = "Sci-Fi & Fantasy";
      $movie->description = "When lonely Mai forms an unlikely bond with a top-secret robot, they embark on an intense, action-packed adventure to foil the plot of a vicious villain.";
      $movie->cover = "next_gen.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Sierra Burgess Is A Loser";
      $movie->director = "Ian Samuels";
      $movie->cast = "Shannon Purser, Kristine Froseth, RJ Cyler, Noah Centineo, Loretta Devine, Giorgia Whigham, Alice Lee, Lea Thompson, Alan Ruck, Mary Pat Gleason, Chrissy Metz";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2018;
      $movie->rating = 7.9;
      $movie->duration = "106 min";
      $movie->genre = "Comedy";
      $movie->description = "A wrong-number text sparks a virtual romance between a smart but unpopular teen and a sweet jock who thinks he's talking to a gorgeous cheerleader.";
      $movie->cover = "sierra.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "A Star Is Born";
      $movie->director = "Gaspar NoÃ©";
      $movie->cast = "Karl Glusman, Klara Kristin, Aomi Muyock, Ugo Fox, Juan Saavedra, Gaspar NoÃ©, Isabelle Nicou";
      $movie->country = "France";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2015;
      $movie->rating = 8.5;
      $movie->duration = "135 min";
      $movie->genre = "Drama";
      $movie->description = "A man in an unsatisfying marriage recalls the details of an intense past relationship with an ex-girlfriend when he gets word that she may be missing.";
      $movie->cover = "a_star_is_born.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Manhattan Romance";
      $movie->director = "Tom O'Brien";
      $movie->cast = "Tom O'Brien, Katherine Waterston, Caitlin Fitzgerald, Gaby Hoffmann, Louis Cancelmi, Zach Grenier";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2014;
      $movie->rating = 9;
      $movie->duration = "98 min";
      $movie->genre = "Comedy";
      $movie->description = "A filmmaker working on a documentary about love in modern Manhattan becomes personally entangled in the romantic lives of his subjects.";
      $movie->cover = "manhattan_romance.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Moonwalkers";
      $movie->director = "Antoine Bardou-Jacquet";
      $movie->cast = "Ron Perlman, Rupert Grint, Robert Sheehan, Stephen Campbell Moore, Eric Lampaert, Kevin Bishop, Tom Audenaert, Erika Sainte";
      $movie->country = "France";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2015;
      $movie->rating = 7.6;
      $movie->duration = "96 min";
      $movie->genre = "Action & Adventure";
      $movie->description = "A brain-addled war vet, a failing band manager and a Stanley Kubrick impersonator help the CIA construct an epic scam by faking the 1969 moon landing.";
      $movie->cover = "moonwalkers.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "The Runner";
      $movie->director = "Austin Stark";
      $movie->cast = "Nicolas Cage, Sarah Paulson, Connie Nielsen, Wendell Pierce, Bryan Batt, Peter Fonda, Dana Gourrier";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2015;
      $movie->rating = 5.8;
      $movie->duration = "90 min";
      $movie->genre = "Drama";
      $movie->description = "A New Orleans politician finds his idealistic plans for rebuilding after a toxic oil spill unraveling thanks to a sex scandal.";
      $movie->cover = "the_runner.jpg";
      $movie->save();



    }
}
