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
      $movie->date_added = "2020-02-27";
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
      $movie->date_added = "2018-10-23";
      $movie->release_year = 2019;
      $movie->rating = 7.45;
      $movie->duration = "190 min";
      $movie->genre = "Drama";
      $movie->description = "Before planning an awesome wedding for his grandfather, a polar bear king must take back a stolen artifact from an evil archaeologist first.";
      $movie->cover = "found.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Destination";
      $movie->director = "Steven Spielberg";
      $movie->cast = "Jennifer Lawrence, Matt Damon, Adam Sandler";
      $movie->country = "United States";
      $movie->date_added = "2020-12-23";
      $movie->release_year = 2019;
      $movie->rating = 6.4;
      $movie->duration = "190 min";
      $movie->genre = "Horror";
      $movie->description = "Before planning an awesome wedding for his grandfather, a polar bear king must take back a stolen artifact from an evil archaeologist first.";
      $movie->cover = "IO.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Roadtrip";
      $movie->director = "Steven Spielberg";
      $movie->cast = "Jennifer Lawrence, Matt Damon, Adam Sandler";
      $movie->country = "United States";
      $movie->date_added = "2017-02-10";
      $movie->release_year = 2019;
      $movie->rating = 8.9;
      $movie->duration = "190 min";
      $movie->genre = "Comedy";
      $movie->description = "Before planning an awesome wedding for his grandfather, a polar bear king must take back a stolen artifact from an evil archaeologist first.";
      $movie->cover = "roadtrip.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "1917";
      $movie->director = "Sam Mendes";
      $movie->cast = "Richard Madden, Matt Damon, Adam Sandler";
      $movie->country = "United States";
      $movie->date_added = "2019-03-05";
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
      $movie->date_added = "2017-05-17";
      $movie->release_year = 2020;
      $movie->rating = 8.7;
      $movie->duration = "108 min";
      $movie->genre = "Comedy";
      $movie->description = "Hitler Youth cadet Jojo Betzler firmly believes in the ideals of Nazism manifested by his imaginary friend, Adolf Hitler. ";
      $movie->cover = "jojo.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Norm of the North: King Sized Adventure";
      $movie->director = "Richard Finn";
      $movie->cast = "Alan Marriott, Andrew Toth, Brian Dobson, Cole Howard, Jennifer Cameron, Jonathan Holmes, Lee Tockar, Lisa Durupt, Maya Kay, Michael Dobson";
      $movie->country = "United States";
      $movie->date_added = "2016-06-21";
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
      $movie->date_added = "2007-10-01";
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
      $movie->date_added = "2021-11-04";
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
      $movie->date_added = "2019-01-27";
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
      $movie->date_added = "2020-09-30";
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
      $movie->date_added = "2018-05-14";
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
      $movie->date_added = "2020-08-13";
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
      $movie->date_added = "2019-07-19";
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
      $movie->date_added = "2009-02-12";
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
      $movie->date_added = "2020-09-12";
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
      $movie->date_added = "2019-12-23";
      $movie->release_year = 2015;
      $movie->rating = 7.6;
      $movie->duration = "96 min";
      $movie->genre = "Action & Adventure";
      $movie->description = "A brain-addled war vet, a failing band manager and a Stanley Kubrick impersonator help the CIA construct an epic scam by faking the 1969 moon landing.";
      $movie->cover = "moowalkers.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "The Runner";
      $movie->director = "Austin Stark";
      $movie->cast = "Nicolas Cage, Sarah Paulson, Connie Nielsen, Wendell Pierce, Bryan Batt, Peter Fonda, Dana Gourrier";
      $movie->country = "United States";
      $movie->date_added = "2021-02-28";
      $movie->release_year = 2015;
      $movie->rating = 5.8;
      $movie->duration = "90 min";
      $movie->genre = "Drama";
      $movie->description = "A New Orleans politician finds his idealistic plans for rebuilding after a toxic oil spill unraveling thanks to a sex scandal.";
      $movie->cover = "the_runner.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Parasite";
      $movie->director = "Bong Joon Ho";
      $movie->cast = " Kang-ho Song, Lee Sun-kyun, Cho Yeo-jeong";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2019;
      $movie->rating = 8.6;
      $movie->duration = "2h 12m";
      $movie->genre = "Thriller";
      $movie->description = "Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.";
      $movie->cover = "parasite.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Promising Young Woman";
      $movie->director = "Emerald Fennell";
      $movie->cast = "Carey Mulligan, Bo Burnham, Alison Brie";
      $movie->country = "America";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2020;
      $movie->rating = 7.5;
      $movie->duration = "190 min";
      $movie->genre = "Drama";
      $movie->description = "A young woman, traumatized by a tragic event in her past, seeks out vengeance against those who crossed her path.";
      $movie->cover = "promising.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Pieces of a Woman";
      $movie->director = "Kornél Mundruczó";
      $movie->cast = "Vanessa Kirby, Shia LaBeouf, Ellen Burstyn";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2020;
      $movie->rating = 7.1;
      $movie->duration = "190 min";
      $movie->genre = "Drama";
      $movie->description = "When a young mother's home birth ends in unfathomable tragedy, she begins a year-long odyssey of mourning that fractures relationships with loved ones in this deeply personal story of a woman learning to live alongside her loss.";
      $movie->cover = "pieces.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "One Night in Miami...";
      $movie->director = "Regina King";
      $movie->cast = "Kingsley Ben-Adir, Eli Goree, Aldis Hodge";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2020;
      $movie->rating = 7.2;
      $movie->duration = "190 min";
      $movie->genre = "Drama";
      $movie->description = "Before planning an awesome wedding for his grandfather, a polar bear king must take back a stolen artifact from an evil archaeologist first.";
      $movie->cover = "onenight.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Shadow in the Cloud";
      $movie->director = "Roseanne Liang";
      $movie->cast = "Chloë Grace Moretz, Nick Robinson, Beulah Koale";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2020;
      $movie->rating = 4.8;
      $movie->duration = "190 min";
      $movie->genre = "Action";
      $movie->description = "A female WWII pilot traveling with top secret documents on a B-17 Flying Fortress encounters an evil presence on board the flight.";
      $movie->cover = "shadow.png";
      $movie->save();

      $movie = new Movie();
      $movie->title = "School of Rock";
      $movie->director = "Richard Linklater";
      $movie->cast = "Jack Black, Mike White, Joan Cusack";
      $movie->country = "New Zealand";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2003;
      $movie->rating = 8.7;
      $movie->duration = "108 min";
      $movie->genre = "Comedy";
      $movie->description = "ter being kicked out of his rock band, Dewey Finn becomes a substitute teacher of an uptight elementary private school, only to try and turn his class into a rock band.";
      $movie->cover = "schoolofrock.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Soul";
      $movie->director = "Pete Docter";
      $movie->cast = "Jamie Foxx, Tina Fey, Graham Norton";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2020;
      $movie->rating = 8.1;
      $movie->duration = "190 min";
      $movie->genre = "Adventure";
      $movie->description = "After landing the gig of a lifetime, a New York jazz pianist suddenly finds himself trapped in a strange land between Earth and the afterlife.";
      $movie->cover = "1917.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "She Dies Tomorrow";
      $movie->director = "Amy Seimetz";
      $movie->cast = "Kate Lyn Sheil, Jane Adams, Kentucker Audley";
      $movie->country = "United States";
      $movie->date_added = "2021-02-17";
      $movie->release_year = 2020;
      $movie->rating = 5.2;
      $movie->duration = "96 min";
      $movie->genre = "Comedy";
      $movie->description = "Amy thinks she's dying tomorrow...and it's contagious.";
      $movie->cover = "shedies.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Star Wars: The Last Jedi";
      $movie->director = "Rian Johnson";
      $movie->cast = "Daisy Ridley, John Boyega, Mark Hamill";
      $movie->country = "United States";
      $movie->date_added = "2020-02-27";
      $movie->release_year = 2017;
      $movie->rating = 7.0;
      $movie->duration = "94 min";
      $movie->genre = "Action";
      $movie->description = "Rey develops her newly discovered abilities with the guidance of Luke Skywalker, who is unsettled by the strength of her powers. Meanwhile, the Resistance prepares for battle with the First Order.";
      $movie->cover = "StarWarsTLJ.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "The Dark Knight Rises";
      $movie->director = "Christopher Nolan";
      $movie->cast = "Christian Bale, Tom Hardy, Anne Hathaway";
      $movie->country = "United States";
      $movie->date_added = "2021-01-27";
      $movie->release_year = 2012;
      $movie->rating = 8.4;
      $movie->duration = "99 min";
      $movie->genre = "Action";
      $movie->description = "Eight years after the Joker's reign of anarchy, Batman, with the help of the enigmatic Catwoman, is forced from his exile to save Gotham City from the brutal guerrilla terrorist Bane.";
      $movie->cover = "theDKR.jpeg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Whiplash";
      $movie->director = "Damien Chazelle";
      $movie->cast = "Miles Teller, J.K. Simmons, Melissa Benoist";
      $movie->country = "Bulgaria";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2020;
      $movie->rating = 8.5;
      $movie->duration = "108 min";
      $movie->genre = "Drama";
      $movie->description = "Hitler Youth cadet Jojo Betzler firmly believes in the ideals of Nazism manifested by his imaginary friend, Adolf Hitler. ";
      $movie->cover = "whiplash.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Wolf Walkers";
      $movie->director = "Tomm Moore";
      $movie->cast = "Honor Kneafsey, Eva Whittaker, Sean Bean";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2020;
      $movie->rating = 8.1;
      $movie->duration = "134 min";
      $movie->genre = "Action & Adventure";
      $movie->description = "A young apprentice hunter and her father journey to Ireland to help wipe out the last wolf pack. But everything changes when she befriends a free-spirited girl from a mysterious tribe rumored to transform into wolves by night.";
      $movie->cover = "wolfwalkers.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Annabelle Comes Home";
      $movie->director = "Gary Dauberman";
      $movie->cast = " Vera Farmiga, Patrick Wilson, Mckenna Grace";
      $movie->country = "Netherlands";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2015;
      $movie->rating = 9.5;
      $movie->duration = "95 min";
      $movie->genre = "Action & Adventure";
      $movie->description = "While babysitting the daughter of Ed and Lorraine Warren, a teenager and her friend unknowingly awaken an evil spirit trapped in a doll.";
      $movie->cover = "annabelle.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Corpus Christi";
      $movie->director = "Gabe IbÃez";
      $movie->cast = "Damandeep Singh Baggan, Smita Malhotra, Baba Sehgal";
      $movie->country = "Bulgaria";
      $movie->date_added = "2021-01-17";
      $movie->release_year = 2009;
      $movie->rating = 6.3;
      $movie->duration = "58 min";
      $movie->genre = "Drama";
      $movie->description = "A team of minstrels, including a monkey, cat and donkey, narrate folktales from the Indian regions of Rajasthan, Kerala and Punjab.";
      $movie->cover = "corpuschristi.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Euphoria";
      $movie->director = "Kevin R. Adams";
      $movie->cast = "Zendaya, Charlyne Yi, Jason Sudeikis, Michael PeÃ±a, David Cross, Constance Wu";
      $movie->country = "China";
      $movie->date_added = "2019-02-27";
      $movie->release_year = 2019;
      $movie->rating = 6.8;
      $movie->duration = "106 min";
      $movie->genre = "Comedy";
      $movie->description = "When lonely Mai forms an unlikely bond with a top-secret robot, they embark on an intense, action-packed adventure to foil the plot of a vicious villain.";
      $movie->cover = "euphoria.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Equalizer";
      $movie->director = "Ian Samuels";
      $movie->cast = "Shannon Purser, Kristine Froseth, RJ Cyler, Noah Centineo, Loretta Devine, Giorgia Whigham, Alice Lee, Lea Thompson, Alan Ruck, Mary Pat Gleason, Chrissy Metz";
      $movie->country = "United States";
      $movie->date_added = "2020-04-06";
      $movie->release_year = 2018;
      $movie->rating = 7.9;
      $movie->duration = "106 min";
      $movie->genre = "Comedy";
      $movie->description = "A wrong-number text sparks a virtual romance between a smart but unpopular teen and a sweet jock who thinks he's talking to a gorgeous cheerleader.";
      $movie->cover = "Equalizer.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "The Godfather";
      $movie->director = "Francis Ford";
      $movie->cast = "Marlon Brando, Al Pacino, James Caan";
      $movie->country = "France";
      $movie->date_added = "2019-02-17";
      $movie->release_year = 1972;
      $movie->rating = 9.2;
      $movie->duration = "135 min";
      $movie->genre = "Drama";
      $movie->description = "A man in an unsatisfying marriage recalls the details of an intense past relationship with an ex-girlfriend when he gets word that she may be missing.";
      $movie->cover = "godfather.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Gone Girl";
      $movie->director = "Tom O'Brien";
      $movie->cast = "Tom O'Brien, Katherine Waterston, Caitlin Fitzgerald, Gaby Hoffmann, Louis Cancelmi, Zach Grenier";
      $movie->country = "United States";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2014;
      $movie->rating = 9;
      $movie->duration = "98 min";
      $movie->genre = "Comedy";
      $movie->description = "A filmmaker working on a documentary about love in modern Manhattan becomes personally entangled in the romantic lives of his subjects.";
      $movie->cover = "gonegirl.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Cheaper By the Dozen";
      $movie->director = "Shawn Levy";
      $movie->cast = "Ron Perlman, Rupert Grint, Robert Sheehan, Stephen Campbell Moore, Eric Lampaert, Kevin Bishop, Tom Audenaert, Erika Sainte";
      $movie->country = "France";
      $movie->date_added = "2021-02-27";
      $movie->release_year = 2005;
      $movie->rating = 5.9;
      $movie->duration = "96 min";
      $movie->genre = "Comedy";
      $movie->description = "With his wife doing a book tour, a father of twelve must handle a new job and his unstable brood.";
      $movie->cover = "cheaper.jpg";
      $movie->save();

      $movie = new Movie();
      $movie->title = "Apocalypse";
      $movie->director = "Francis Ford Coppola";
      $movie->cast = "Martin Sheen, Marlon Brando, Robert Duvall";
      $movie->country = "United States";
      $movie->date_added = "2019-02-27";
      $movie->release_year = 1979;
      $movie->rating = 8.4;
      $movie->duration = "90 min";
      $movie->genre = "Drama";
      $movie->description = "A New Orleans politician finds his idealistic plans for rebuilding after a toxic oil spill unraveling thanks to a sex scandal.";
      $movie->cover = "apocalypse.jpg";
      $movie->save();

    }
}
