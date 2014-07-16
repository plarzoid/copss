USE copss;

INSERT INTO events (id, name) VALUES 
	(1,"Tournament"),
	(2,"Tournament Achievement"),
	(3,"Scheduled Demo"),
	(4,"Painting Time"),
	(5,"Painted a Starter Box")
;
INSERT INTO game_systems (id, name) VALUES  
	(1,"Warmachine / Hordes"),
	(2,"Malifaux"),
	(3,"Netrunner"),
	(4,"Dark Age"),
	(5,"Dropzone Commander"),
	(6,"Warhammer 40k"),
	(7,"X-Wing"),
	(8,"Board / Card Games"),
	(9,"Infinity")
;
INSERT INTO game_sizes (id, parent_game_system, size, name) VALUES 
	(1,1,35,"or smaller"),
	(2,1,50,"or larger"),
	(3,2,25,"or smaller"),
	(4,2,35,"or Larger")
;
INSERT INTO achievements (id, name, points, per_game, is_meta, game_count, game_system_id, game_size_id, faction_id, unique_opponent, unique_opponent_locations, played_theme_force, fully_painted, fully_painted_battle, played_scenario, multiplayer, vs_vip, event_id) VALUES  
	(1,"Played 35pt game",1,1,0,0,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2,"Played a 50pt Game",2,1,0,0,1,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(3,"Played a T2+ Theme List",2,1,0,0,1,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL),
	(4,"Played a 25ss Game",1,1,0,0,2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(5,"Played a 35ss game",2,1,0,0,2,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(6,"Played Netrunner",1,1,0,0,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(7,"Played Infinity",1,1,0,0,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(8,"Played Dark Age",1,1,0,0,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(9,"Played Dropzone Commander",1,1,0,0,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(10,"Played 40k",1,1,0,0,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(11,"Played X-Wing",1,1,0,0,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(12,"Played a Board / Card Game",1,1,0,0,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(13,"Played WM/H Fully Painted",1,1,0,0,1,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL),
	(14,"Played Malifaux Fully Painted",1,1,0,0,2,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL),
	(15,"Played Infinity Fully Painted",1,1,0,0,9,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL),
	(16,"Played Dark Age Fully Painted",1,1,0,0,4,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL),
	(17,"Played Dropzone Commander Fully Painted",1,1,0,0,5,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL),
	(18,"Played 40k Fully Painted",1,1,0,0,6,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL),
	(19,"Played Multiplayer WM/H",2,1,0,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
	(20,"Played Multiplayer Malifaux",2,1,0,0,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
	(21,"Played Multiplayer Netrunner",2,1,0,0,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
	(22,"Played Multiplayer Infinity",2,1,0,0,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
	(23,"Played Multiplayer Dark Age",2,1,0,0,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
	(24,"Played Multiplayer Dropzone Commander",2,1,0,0,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
	(25,"Played Multiplayer 40k",2,1,0,0,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
	(26,"Played Multiplayer X-Wing",2,1,0,0,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
	(27,"Played Multiplayer Board/Card Game",2,1,0,0,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),
	(28,"Played WM/H Scenario Table",1,1,0,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),
	(29,"Played Malifaux Scenario Table",1,1,0,0,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),
	(30,"Played infinity Scenario Table",1,1,0,0,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),
	(31,"Played Dark Age Scenario Table",1,1,0,0,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),
	(32,"Played Dropzone Commander Scenario Table",1,1,0,0,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),
	(33,"Played 40k Scenario Table",1,1,0,0,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),
	(34,"Played X-Wing Scenario Table",1,1,0,0,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),
	(35,"Played a Scheduled Demo",3,1,0,0,NULL,NULL,NULL,0,0,0,0,0,0,0,0,3),
	(36,"Played 5 Games",1,0,0,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(37,"Played 10 Games",2,0,0,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(38,"Played 15 Games",3,0,0,15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(39,"Played 20 Games",4,0,0,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(40,"Played Different Opponents",0,1,0,0,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(41,"Played 5 Different Opponents",1,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(42,"Played 10 Different Opponents",2,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(43,"Played 15 Different Opponents",3,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(44,"Played 20 Different Opponents",4,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(45,"Completed a Tournament",10,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
	(46,"Tournament Specific Achievement",3,1,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),
	(47,"Spent Time at G&G Hobby Center",3,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4),
	(48,"Painted Entire Starter at G&G Hobby Center",15,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5)
;
INSERT INTO meta_achievement_criteria (id, parent_achievement, child_achievement, count) VALUES 
	(1,41,40,5),
	(2,42,40,10),
	(3,43,40,15),
	(4,44,40,20)
;
