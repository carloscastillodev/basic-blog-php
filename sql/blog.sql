-- Blog table structure

CREATE TABLE users (
    id              INT             NOT NULL    AUTO_INCREMENT,
    name            VARCHAR(255)    NOT NULL,
    email           VARCHAR(255)    NOT NULL    UNIQUE,
    password        VARCHAR(255)    NOT NULL,
    created_at      TIMESTAMP       NULL,
    updated_at      TIMESTAMP       NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users (name, email, password, created_at)
VALUES
    ('Carlos Castillo', 'ccpdev@gmail.com', '12345678', CURRENT_TIMESTAMP),
    ('John Doe', 'jdoe@example.com', '12345678', CURRENT_TIMESTAMP),
    ('Sasha Roe', 'sroe@example.com', '12345678', CURRENT_TIMESTAMP);

CREATE TABLE posts (
    id              INT             NOT NULL    AUTO_INCREMENT,
    title           VARCHAR(255)    NOT NULL,
    content         TEXT            NOT NULL,
    img_url         VARCHAR(255)    NOT NULL,
    author_id       INT             NOT NULL,
    created_at      TIMESTAMP       NULL,
    updated_at      TIMESTAMP       NULL,
PRIMARY KEY (id),
FOREIGN KEY (author_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Post titles generated using https://randomwordgenerator.com/
-- Images generated using https://picsum.photos/
INSERT INTO posts (title, content, img_url, author_id, created_at)
VALUES
    ('You Can''t Judge a Book By Its Cover',                                                                    'Post content 1',   'https://picsum.photos/id/1/850/450', 1, CURRENT_TIMESTAMP),
    ('Drive Me Nuts',                                                                                           'Post content 2',   'https://picsum.photos/id/20/850/450', 1, CURRENT_TIMESTAMP),
    ('Birds of a Feather Flock Together',                                                                       'Post content 3',   'https://picsum.photos/id/30/850/450', 1, CURRENT_TIMESTAMP),
    ('If You Can''t Stand the Heat, Get Out of the Kitchen',                                                    'Post content 4',   'https://picsum.photos/id/40/850/450', 1, CURRENT_TIMESTAMP),
    ('Man of Few Words',                                                                                        'Post content 5',   'https://picsum.photos/id/50/850/450', 2, CURRENT_TIMESTAMP),
    ('Someone who''s given an advantage over others',                                                           'Post content 6',   'https://picsum.photos/id/60/850/450', 1, CURRENT_TIMESTAMP),
    ('Having strong feelings of happiness or satisfaction',                                                     'Post content 7',   'https://picsum.photos/id/70/850/450', 3, CURRENT_TIMESTAMP),
    ('Ring Any Bells?',                                                                                         'Post content 8',   'https://picsum.photos/id/80/850/450', 1, CURRENT_TIMESTAMP),
    ('Delicious; something that looks or tastes appetizing',                                                    'Post content 9',   'https://picsum.photos/id/90/850/450', 1, CURRENT_TIMESTAMP),
    ('Cut To The Chase',                                                                                        'Post content 10', 'https://picsum.photos/id/100/850/450', 2, CURRENT_TIMESTAMP),
    ('A situation that has gotten way more serious or interesting due to recent complexities or developments',  'Post content 11', 'https://picsum.photos/id/110/850/450', 1, CURRENT_TIMESTAMP),
    ('Like Father Like Son',                                                                                    'Post content 12', 'https://picsum.photos/id/120/850/450', 1, CURRENT_TIMESTAMP),
    ('Resembling one''s parents in terms of appearance or behavior',                                            'Post content 13', 'https://picsum.photos/id/130/850/450', 3, CURRENT_TIMESTAMP),
    ('Drawing a Blank',                                                                                         'Post content 14', 'https://picsum.photos/id/140/850/450', 1, CURRENT_TIMESTAMP),
    ('Failing to recall a memory, unable to remember something',                                                'Post content 15', 'https://picsum.photos/id/152/850/450', 3, CURRENT_TIMESTAMP),
    ('A Dime a Dozen',                                                                                          'Post content 16', 'https://picsum.photos/id/160/850/450', 1, CURRENT_TIMESTAMP),
    ('Something that is extremely common',                                                                      'Post content 17', 'https://picsum.photos/id/170/850/450', 2, CURRENT_TIMESTAMP),
    ('A Busy Body',                                                                                             'Post content 18', 'https://picsum.photos/id/180/850/450', 2, CURRENT_TIMESTAMP),
    ('Someone who gets into other people''s business',                                                          'Post content 19', 'https://picsum.photos/id/190/850/450', 1, CURRENT_TIMESTAMP),
    ('Elephant in the Room',                                                                                    'Post content 20', 'https://picsum.photos/id/200/850/450', 1, CURRENT_TIMESTAMP),
    ('All Greek To Me',                                                                                         'Post content 21', 'https://picsum.photos/id/237/850/450', 3, CURRENT_TIMESTAMP),
    ('A Busy Bee',                                                                                              'Post content 22', 'https://picsum.photos/id/538/850/450', 1, CURRENT_TIMESTAMP),
    ('Right Out of the Gate',                                                                                   'Post content 23', 'https://picsum.photos/id/582/850/450', 3, CURRENT_TIMESTAMP),
    ('Hit me with your pet shark!',                                                                             'Post content 24', 'https://picsum.photos/id/593/850/450', 3, CURRENT_TIMESTAMP),
    ('Give a Man a Fish',                                                                                       'Post content 25', 'https://picsum.photos/id/611/850/450', 1, CURRENT_TIMESTAMP),
    ('Down To The Wire',                                                                                        'Post content 26', 'https://picsum.photos/id/1011/850/450', 3, CURRENT_TIMESTAMP),
    ('Jack of All Trades Master of None',                                                                       'Post content 27', 'https://picsum.photos/850/450?grayscale', 1, CURRENT_TIMESTAMP),
    ('This is a Japanese doll',                                                                                 'Post content 28', 'https://picsum.photos/850/450/?blur=2', 2, CURRENT_TIMESTAMP),
    ('Erin accidentally created a new universe',                                                                'Post content 29', 'https://picsum.photos/800/450?random', 1, CURRENT_TIMESTAMP),
    ('He is no James Bond; his name is Roger Moore',                                                            'Post content 30', 'https://picsum.photos/seed/picsum/850/450', 2, CURRENT_TIMESTAMP);

-- Post content generated using https://www.lipsum.com/
UPDATE posts
SET content =
    '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam felis nisl, gravida sed elit id, viverra maximus risus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc tempus nulla vitae ex bibendum cursus. Aliquam at elit efficitur, molestie tellus quis, rutrum eros. Duis venenatis nunc sed diam commodo luctus. Vestibulum faucibus laoreet consequat. Nunc id vehicula orci. Aenean tincidunt nunc quis ex laoreet fermentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
    <p>Aenean ac odio a augue rhoncus rhoncus a non mi. Proin tempus dapibus neque, et sodales lorem dictum vel. Nulla facilisi. Pellentesque commodo blandit molestie. Phasellus interdum malesuada fringilla. Donec venenatis ut nisl in scelerisque. Nulla cursus dictum nisi, at feugiat lacus efficitur vitae. Fusce ac nisl eu diam tincidunt dignissim. Quisque velit sapien, vehicula pulvinar consequat ut, ultrices ac felis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In sit amet diam id ligula aliquam semper. Quisque et enim neque. Suspendisse ac arcu a nibh vestibulum porta. Integer scelerisque, arcu eu iaculis dignissim, turpis ipsum lacinia diam, quis ultrices eros magna sagittis risus.</p>
    <p>Nam aliquam varius auctor. Mauris pellentesque semper odio. Sed ultricies, metus at ultrices euismod, eros ante cursus purus, sed varius eros arcu vel quam. Nulla facilisi. Ut vel nunc sit amet lorem fringilla varius. Donec varius interdum facilisis. Praesent accumsan molestie felis, et interdum ipsum rhoncus ut. In at augue ac diam semper consequat.</p>
    <p>Sed elementum ligula ut est rutrum, at accumsan nulla ullamcorper. Nunc et euismod magna, et pulvinar enim. Phasellus mollis urna pharetra viverra iaculis. Etiam eleifend ante quis convallis sagittis. Sed vel ante in dui porttitor vehicula. Praesent sodales sem non blandit faucibus. Nullam auctor erat ac purus vestibulum, sed auctor purus posuere. Cras congue pellentesque nisi a consequat. Proin fermentum dui vitae est congue elementum. Etiam nec elit tempus, pulvinar turpis sed, aliquam tortor. Cras ultrices, arcu ut tempus condimentum, enim nibh laoreet velit, non lacinia sapien tellus non urna. Integer dictum pellentesque semper.</p>
    <p>Donec semper et libero vitae mattis. Donec consequat imperdiet odio, vel consequat diam. Sed semper, tortor sed bibendum luctus, tellus risus facilisis dui, vel consequat lacus purus et odio. Etiam tortor libero, condimentum vel ullamcorper at, pharetra non magna. Ut in enim vitae massa eleifend blandit. Sed imperdiet aliquet diam ut dapibus. Pellentesque eget hendrerit ipsum. Maecenas at ex quam. Maecenas odio orci, mollis non mauris nec, lacinia condimentum nibh. Nunc sit amet finibus ipsum. Nullam eu augue eu ligula tempor convallis non eget tortor. Fusce a gravida orci, vel semper urna. Pellentesque porta, massa sit amet vehicula auctor, nunc turpis blandit purus, sit amet iaculis urna ante ut elit.</p>'
WHERE 1;

-- Test insert
INSERT INTO posts (title, content, img_url, author_id, created_at)
VALUES
    (
        'An example post',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ultrices sodales sem. Aliquam est eros, dictum euismod molestie nec, venenatis sit amet tellus. Duis eu erat quis nibh tempus vulputate. Pellentesque velit lorem, auctor vitae facilisis eu, eleifend a quam. Etiam sit amet faucibus ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras auctor eros ac sapien mollis consectetur. Donec non faucibus tortor, sit amet feugiat turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus arcu enim, viverra vel aliquam ut, finibus eget nisl. Nam eget lacus ut elit dictum maximus sed consequat erat. Donec vitae pretium ipsum. Suspendisse ac blandit nisl, id consectetur sem. Sed at tellus mollis, lobortis nisi vel, congue lorem. Donec euismod, nisl eu placerat pharetra, risus orci elementum dolor, non egestas massa urna id leo.',
        'https://picsum.photos/id/937/850/450',
        2,
        '2022-11-10'
    ),
    (
        'Another test post',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ultrices sodales sem. Aliquam est eros, dictum euismod molestie nec, venenatis sit amet tellus. Duis eu erat quis nibh tempus vulputate. Pellentesque velit lorem, auctor vitae facilisis eu, eleifend a quam. Etiam sit amet faucibus ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras auctor eros ac sapien mollis consectetur. Donec non faucibus tortor, sit amet feugiat turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus arcu enim, viverra vel aliquam ut, finibus eget nisl. Nam eget lacus ut elit dictum maximus sed consequat erat. Donec vitae pretium ipsum. Suspendisse ac blandit nisl, id consectetur sem. Sed at tellus mollis, lobortis nisi vel, congue lorem. Donec euismod, nisl eu placerat pharetra, risus orci elementum dolor, non egestas massa urna id leo.',
        'https://picsum.photos/850/450?random=1',
        3,
        '2022-11-10 07:15:00'
    ),
    (
        'Needle In a Haystack',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ultrices sodales sem. Aliquam est eros, dictum euismod molestie nec, venenatis sit amet tellus. Duis eu erat quis nibh tempus vulputate. Pellentesque velit lorem, auctor vitae facilisis eu, eleifend a quam. Etiam sit amet faucibus ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras auctor eros ac sapien mollis consectetur. Donec non faucibus tortor, sit amet feugiat turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus arcu enim, viverra vel aliquam ut, finibus eget nisl. Nam eget lacus ut elit dictum maximus sed consequat erat. Donec vitae pretium ipsum. Suspendisse ac blandit nisl, id consectetur sem. Sed at tellus mollis, lobortis nisi vel, congue lorem. Donec euismod, nisl eu placerat pharetra, risus orci elementum dolor, non egestas massa urna id leo.',
        'https://picsum.photos/id/832/850/450',
        1,
        '2022-11-09 03:05:00'
    ),
    (
        'Jack of All Trades Master of None',
        'Donec non laoreet arcu. Vivamus eget dui at justo pulvinar laoreet nec efficitur dolor. Pellentesque congue mi vitae odio dictum, quis varius erat fermentum. Sed a augue gravida, pulvinar nisi eu, blandit nibh. Suspendisse eget quam lorem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque eget sem sit amet sapien sollicitudin aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut lobortis, massa sit amet facilisis imperdiet, orci libero vestibulum massa, eu congue augue nisi non turpis. Praesent scelerisque, erat ut tincidunt iaculis, risus ipsum hendrerit nulla, eu rutrum tellus lectus ac nisi. Quisque gravida libero magna, vitae tempus libero lacinia porta.',
        'https://picsum.photos/id/7/850/450',
        1,
        '2022-11-10 21:15:00'
    ),
    (
        'It was the scarcity that fueled his creativity',
        'Mauris posuere vehicula convallis. Fusce venenatis commodo justo, in imperdiet augue commodo ut. Maecenas non orci aliquet, consequat quam ac, maximus ipsum. Suspendisse potenti. Aliquam in risus ante. Suspendisse molestie placerat tincidunt. Morbi pretium tristique pellentesque. Donec non laoreet arcu. Vivamus eget dui at justo pulvinar laoreet nec efficitur dolor. Pellentesque congue mi vitae odio dictum, quis varius erat fermentum. Sed a augue gravida, pulvinar nisi eu, blandit nibh. Suspendisse eget quam lorem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque eget sem sit amet sapien sollicitudin aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut lobortis, massa sit amet facilisis imperdiet, orci libero vestibulum massa, eu congue augue nisi non turpis. Praesent scelerisque, erat ut tincidunt iaculis, risus ipsum hendrerit nulla, eu rutrum tellus lectus ac nisi. Quisque gravida libero magna, vitae tempus libero lacinia porta.',
        'https://picsum.photos/id/755/850/450',
        1,
        '2022-11-10'
    );

-- Test insert
-- Images generated using https://dummyimage.com/
INSERT INTO posts (title, content, img_url, author_id, created_at)
VALUES
    (
        'PSR-4: Autoloader',
        '<p>This document specifies an Internet Best Current Practices for the Internet Community, and requests discussion and suggestions for improvements.  Distribution of this memo is unlimited.</p><p>Abstract. In many standards track documents several words are used to signify the requirements in the specification.  These words are often capitalized.  This document defines these words as they should be interpreted in IETF documents.  Authors who follow these guidelines should incorporate this phrase near the beginning of their document.</p><ol><li>MUST. This word, or the terms "REQUIRED" or "SHALL", mean that the definition is an absolute requirement of the specification.</li><li>MUST NOT.   This phrase, or the phrase "SHALL NOT", mean that the definition is an absolute prohibition of the specification.</li><li>SHOULD. This word, or the adjective "RECOMMENDED", mean that there may exist valid reasons in particular circumstances to ignore a particular item, but the full implications must be understood and carefully weighed before choosing a different course.</li><li>SHOULD NOT. This phrase, or the phrase "NOT RECOMMENDED" mean that there may exist valid reasons in particular circumstances when the particular behavior is acceptable or even useful, but the full implications should be understood and the case carefully weighed before implementing any behavior described with this label.</li></ol>',
        'https://dummyimage.com/850x450/20752b/ffffff.png&text=PSR-4:+Autoloader',
        1,
        '2022-11-10 10:23:00'
    );

-- Test insert
-- Images generated using https://placeimg.com/
INSERT INTO posts (title, content, img_url, author_id, created_at)
VALUES
    (
        'Top 10 Technology Blogs for Latest Tech Updates, News & Information!',
        '<p>This document specifies an Internet Best Current Practices for the Internet Community, and requests discussion and suggestions for improvements.  Distribution of this memo is unlimited.</p><p>Abstract. In many standards track documents several words are used to signify the requirements in the specification.  These words are often capitalized.  This document defines these words as they should be interpreted in IETF documents.  Authors who follow these guidelines should incorporate this phrase near the beginning of their document.</p><ol><li>MUST. This word, or the terms "REQUIRED" or "SHALL", mean that the definition is an absolute requirement of the specification.</li><li>MUST NOT.   This phrase, or the phrase "SHALL NOT", mean that the definition is an absolute prohibition of the specification.</li><li>SHOULD. This word, or the adjective "RECOMMENDED", mean that there may exist valid reasons in particular circumstances to ignore a particular item, but the full implications must be understood and carefully weighed before choosing a different course.</li><li>SHOULD NOT. This phrase, or the phrase "NOT RECOMMENDED" mean that there may exist valid reasons in particular circumstances when the particular behavior is acceptable or even useful, but the full implications should be understood and the case carefully weighed before implementing any behavior described with this label.</li></ol>',
        'https://placeimg.com/850/450/tech',
        1,
        '2022-11-11 11:18:00'
    );






