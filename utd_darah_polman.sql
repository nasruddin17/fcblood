-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Sep 2023 pada 23.46
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utd_darah_polman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis`
--

CREATE TABLE `tbl_jenis` (
  `id_jenis` int(11) NOT NULL,
  `komponen_darah` varchar(255) DEFAULT NULL,
  `golongan_darah` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_jenis`
--

INSERT INTO `tbl_jenis` (`id_jenis`, `komponen_darah`, `golongan_darah`) VALUES
(29, 'WB', 'O'),
(28, 'WB', 'AB'),
(27, 'WB', 'B'),
(26, 'WB', 'A'),
(25, 'TC', 'O'),
(24, 'TC', 'AB'),
(23, 'TC', 'B'),
(22, 'TC', 'A'),
(21, 'PRC', 'O'),
(20, 'PRC', 'AB'),
(19, 'PRC', 'B'),
(18, 'PRC', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kasus`
--

CREATE TABLE `tbl_kasus` (
  `id_kasus` int(11) NOT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  `bulan` varchar(255) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_kasus`
--

INSERT INTO `tbl_kasus` (`id_kasus`, `id_jenis`, `tahun`, `bulan`, `jml`) VALUES
(512, 22, '2022', '10', 15),
(511, 22, '2022', '9', 26),
(510, 22, '2022', '8', 43),
(509, 22, '2022', '7', 49),
(508, 22, '2022', '6', 17),
(507, 22, '2022', '5', 29),
(506, 22, '2022', '4', 16),
(505, 22, '2022', '3', 10),
(504, 22, '2022', '2', 17),
(503, 22, '2022', '1', 23),
(502, 22, '2021', '12', 27),
(501, 22, '2021', '11', 18),
(500, 22, '2021', '10', 13),
(499, 22, '2021', '9', 18),
(498, 22, '2021', '8', 12),
(497, 22, '2021', '7', 4),
(496, 22, '2021', '6', 20),
(495, 22, '2021', '5', 23),
(494, 22, '2021', '4', 13),
(493, 22, '2021', '3', 30),
(492, 22, '2021', '2', 16),
(491, 22, '2021', '1', 4),
(490, 22, '2020', '12', 5),
(489, 22, '2020', '11', 50),
(488, 22, '2020', '10', 43),
(487, 22, '2020', '9', 11),
(486, 22, '2020', '8', 10),
(485, 22, '2020', '7', 18),
(484, 22, '2020', '6', 10),
(483, 22, '2020', '5', 30),
(482, 22, '2020', '4', 23),
(481, 22, '2020', '3', 50),
(480, 22, '2020', '2', 28),
(479, 22, '2020', '1', 94),
(478, 21, '2022', '12', 200),
(477, 21, '2022', '11', 126),
(476, 21, '2022', '10', 26),
(475, 21, '2022', '9', 119),
(474, 21, '2022', '8', 124),
(473, 21, '2022', '7', 213),
(472, 21, '2022', '6', 140),
(471, 21, '2022', '5', 101),
(470, 21, '2022', '4', 132),
(469, 21, '2022', '3', 123),
(468, 21, '2022', '2', 177),
(467, 21, '2022', '1', 128),
(466, 21, '2021', '12', 145),
(465, 21, '2021', '11', 129),
(464, 21, '2021', '10', 160),
(463, 21, '2021', '9', 129),
(462, 21, '2021', '8', 150),
(461, 21, '2021', '7', 200),
(460, 21, '2021', '6', 140),
(459, 21, '2021', '5', 164),
(458, 21, '2021', '4', 124),
(457, 21, '2021', '3', 165),
(456, 21, '2021', '2', 96),
(455, 21, '2021', '1', 111),
(454, 21, '2020', '12', 124),
(453, 21, '2020', '11', 133),
(452, 21, '2020', '10', 139),
(451, 21, '2020', '9', 90),
(450, 21, '2020', '8', 91),
(449, 21, '2020', '7', 162),
(448, 21, '2020', '6', 175),
(447, 21, '2020', '5', 134),
(446, 21, '2020', '4', 132),
(445, 21, '2020', '3', 98),
(444, 21, '2020', '2', 112),
(443, 21, '2020', '1', 116),
(442, 20, '2022', '12', 75),
(441, 20, '2022', '11', 84),
(440, 20, '2022', '10', 80),
(439, 20, '2022', '9', 127),
(438, 20, '2022', '8', 68),
(437, 20, '2022', '7', 40),
(436, 20, '2022', '6', 37),
(435, 20, '2022', '5', 87),
(434, 20, '2022', '4', 32),
(433, 20, '2022', '3', 90),
(432, 20, '2022', '2', 20),
(431, 20, '2022', '1', 102),
(430, 20, '2021', '12', 47),
(429, 20, '2021', '11', 34),
(428, 20, '2021', '10', 34),
(427, 20, '2021', '9', 28),
(426, 20, '2021', '8', 40),
(425, 20, '2021', '7', 26),
(424, 20, '2021', '6', 44),
(423, 20, '2021', '5', 63),
(422, 20, '2021', '4', 38),
(421, 20, '2021', '3', 35),
(420, 20, '2021', '2', 25),
(419, 20, '2021', '1', 28),
(418, 20, '2020', '12', 27),
(417, 20, '2020', '11', 46),
(416, 20, '2020', '10', 19),
(415, 20, '2020', '9', 35),
(414, 20, '2020', '8', 34),
(413, 20, '2020', '7', 27),
(412, 20, '2020', '6', 43),
(411, 20, '2020', '5', 28),
(410, 20, '2020', '4', 17),
(409, 20, '2020', '3', 24),
(408, 20, '2020', '2', 29),
(407, 20, '2020', '1', 35),
(406, 19, '2022', '12', 80),
(405, 19, '2022', '11', 90),
(404, 19, '2022', '10', 100),
(403, 19, '2022', '9', 93),
(402, 19, '2022', '8', 98),
(401, 19, '2022', '7', 118),
(400, 19, '2022', '6', 89),
(399, 19, '2022', '5', 67),
(398, 19, '2022', '4', 76),
(397, 19, '2022', '3', 87),
(396, 19, '2022', '2', 85),
(395, 19, '2022', '1', 99),
(394, 19, '2021', '12', 97),
(393, 19, '2021', '11', 76),
(392, 19, '2021', '10', 102),
(391, 19, '2021', '9', 91),
(390, 19, '2021', '8', 55),
(389, 19, '2021', '7', 91),
(388, 19, '2021', '6', 123),
(387, 19, '2021', '5', 110),
(386, 19, '2021', '4', 129),
(385, 19, '2021', '3', 117),
(384, 19, '2021', '2', 61),
(383, 19, '2021', '1', 81),
(382, 19, '2020', '12', 108),
(381, 19, '2020', '11', 86),
(380, 19, '2020', '10', 87),
(379, 19, '2020', '9', 79),
(378, 19, '2020', '8', 53),
(377, 19, '2020', '7', 73),
(376, 19, '2020', '1', 120),
(375, 19, '2020', '5', 84),
(374, 19, '2020', '4', 65),
(373, 19, '2020', '3', 84),
(372, 19, '2020', '2', 89),
(371, 19, '2020', '6', 92),
(370, 18, '2022', '12', 130),
(369, 18, '2022', '11', 112),
(368, 18, '2022', '10', 180),
(367, 18, '2022', '9', 140),
(366, 18, '2022', '8', 142),
(365, 18, '2022', '7', 118),
(364, 18, '2022', '6', 130),
(363, 18, '2022', '5', 123),
(362, 18, '2022', '4', 113),
(361, 18, '2022', '3', 100),
(360, 18, '2022', '2', 112),
(359, 18, '2022', '1', 114),
(358, 18, '2021', '12', 156),
(357, 18, '2021', '11', 133),
(356, 18, '2021', '10', 97),
(355, 18, '2021', '9', 98),
(354, 18, '2021', '8', 107),
(353, 18, '2021', '7', 89),
(352, 18, '2021', '6', 162),
(351, 18, '2021', '5', 133),
(350, 18, '2021', '4', 146),
(349, 18, '2021', '3', 130),
(348, 18, '2021', '2', 84),
(347, 18, '2021', '1', 90),
(346, 18, '2020', '12', 94),
(345, 18, '2020', '11', 117),
(344, 18, '2020', '10', 112),
(343, 18, '2020', '9', 106),
(342, 18, '2020', '8', 43),
(341, 18, '2020', '7', 105),
(340, 18, '2020', '6', 117),
(339, 18, '2020', '5', 62),
(338, 18, '2020', '4', 81),
(337, 18, '2020', '3', 79),
(336, 18, '2020', '2', 115),
(335, 18, '2020', '1', 100),
(513, 22, '2022', '11', 20),
(514, 22, '2022', '12', 12),
(515, 23, '2020', '1', 38),
(516, 23, '2020', '2', 37),
(517, 23, '2020', '3', 32),
(518, 23, '2020', '4', 5),
(520, 23, '2020', '5', 4),
(521, 23, '2020', '6', 6),
(522, 23, '2020', '7', 6),
(523, 23, '2020', '8', 3),
(524, 23, '2020', '9', 8),
(525, 23, '2020', '10', 9),
(526, 23, '2020', '11', 40),
(527, 23, '2020', '12', 23),
(535, 23, '2021', '7', 4),
(529, 23, '2021', '1', 7),
(530, 23, '2021', '2', 4),
(531, 23, '2021', '3', 3),
(532, 23, '2021', '4', 33),
(533, 23, '2021', '5', 44),
(534, 23, '2021', '6', 14),
(536, 23, '2021', '8', 6),
(537, 23, '2021', '9', 13),
(538, 23, '2021', '10', 14),
(539, 23, '2021', '11', 48),
(540, 23, '2021', '12', 32),
(541, 23, '2022', '1', 35),
(542, 23, '2022', '2', 12),
(543, 23, '2022', '3', 20),
(544, 23, '2022', '4', 12),
(545, 23, '2022', '5', 30),
(546, 23, '2022', '6', 21),
(547, 23, '2022', '7', 26),
(548, 23, '2022', '8', 11),
(549, 23, '2022', '9', 48),
(550, 23, '2022', '10', 18),
(551, 23, '2022', '11', 16),
(552, 23, '2022', '12', 45),
(553, 24, '2020', '1', 14),
(554, 24, '2020', '2', 10),
(555, 24, '2020', '3', 4),
(556, 24, '2020', '4', 9),
(557, 24, '2020', '5', 10),
(558, 24, '2020', '6', 13),
(559, 24, '2020', '7', 5),
(560, 24, '2020', '8', 9),
(561, 24, '2020', '9', 10),
(562, 24, '2020', '10', 2),
(563, 24, '2020', '11', 4),
(564, 24, '2020', '12', 14),
(565, 24, '2021', '1', 4),
(566, 24, '2021', '2', 5),
(567, 24, '2021', '3', 6),
(568, 24, '2021', '4', 8),
(569, 24, '2021', '5', 9),
(570, 24, '2021', '6', 15),
(571, 24, '2021', '7', 5),
(572, 24, '2021', '8', 6),
(573, 24, '2021', '9', 5),
(574, 24, '2021', '10', 7),
(575, 24, '2021', '11', 3),
(576, 24, '2021', '12', 16),
(577, 24, '2022', '1', 12),
(578, 24, '2022', '2', 10),
(579, 24, '2022', '3', 8),
(580, 24, '2022', '4', 8),
(581, 24, '2022', '5', 20),
(582, 24, '2022', '6', 19),
(583, 24, '2022', '7', 24),
(584, 24, '2022', '8', 16),
(585, 24, '2022', '9', 12),
(586, 24, '2022', '10', 10),
(587, 24, '2022', '11', 13),
(588, 24, '2022', '12', 6),
(589, 25, '2020', '1', 79),
(590, 25, '2020', '2', 37),
(591, 25, '2020', '3', 58),
(592, 25, '2020', '4', 42),
(593, 25, '2020', '5', 32),
(594, 25, '2020', '6', 30),
(595, 25, '2020', '7', 34),
(596, 25, '2020', '8', 40),
(597, 25, '2020', '9', 8),
(598, 25, '2020', '10', 4),
(599, 25, '2020', '11', 12),
(600, 25, '2020', '12', 52),
(601, 25, '2021', '1', 21),
(602, 25, '2021', '2', 24),
(603, 25, '2021', '3', 6),
(604, 25, '2021', '4', 22),
(605, 25, '2021', '5', 18),
(606, 25, '2021', '6', 22),
(607, 25, '2021', '7', 37),
(608, 25, '2021', '8', 55),
(609, 25, '2021', '9', 9),
(610, 25, '2021', '10', 22),
(611, 25, '2021', '11', 79),
(612, 25, '2021', '12', 47),
(613, 25, '2022', '1', 20),
(614, 25, '2022', '2', 10),
(615, 25, '2022', '3', 11),
(616, 25, '2022', '4', 20),
(617, 25, '2022', '5', 6),
(618, 25, '2022', '6', 24),
(619, 25, '2022', '7', 32),
(620, 25, '2022', '8', 25),
(621, 25, '2022', '9', 20),
(622, 25, '2022', '10', 23),
(623, 25, '2022', '11', 33),
(624, 25, '2022', '12', 26),
(625, 26, '2020', '1', 7),
(626, 26, '2020', '2', 3),
(627, 26, '2020', '3', 9),
(628, 26, '2020', '4', 8),
(629, 26, '2020', '5', 3),
(630, 26, '2020', '6', 2),
(631, 26, '2020', '7', 3),
(632, 26, '2020', '8', 2),
(633, 26, '2020', '9', 7),
(634, 26, '2020', '10', 11),
(635, 26, '2020', '11', 10),
(636, 26, '2020', '12', 11),
(637, 26, '2021', '1', 1),
(638, 26, '2021', '2', 4),
(639, 26, '2021', '3', 6),
(640, 26, '2021', '4', 9),
(641, 26, '2021', '5', 12),
(642, 26, '2021', '6', 1),
(643, 26, '2021', '7', 6),
(644, 26, '2021', '8', 15),
(645, 26, '2021', '9', 7),
(646, 26, '2021', '10', 3),
(647, 26, '2021', '11', 5),
(648, 26, '2021', '12', 5),
(649, 26, '2022', '1', 3),
(650, 26, '2022', '2', 1),
(651, 26, '2022', '3', 2),
(652, 26, '2022', '4', 4),
(653, 26, '2022', '5', 3),
(654, 26, '2022', '6', 1),
(655, 26, '2022', '7', 2),
(656, 26, '2022', '8', 3),
(657, 26, '2022', '9', 1),
(658, 26, '2022', '10', 2),
(659, 26, '2022', '11', 1),
(660, 26, '2022', '12', 4),
(661, 27, '2020', '1', 7),
(662, 27, '2020', '2', 1),
(663, 27, '2020', '3', 8),
(664, 27, '2020', '4', 3),
(665, 27, '2020', '5', 1),
(666, 27, '2020', '6', 2),
(667, 27, '2020', '7', 2),
(668, 27, '2020', '8', 3),
(669, 27, '2020', '9', 5),
(670, 27, '2020', '10', 3),
(671, 27, '2020', '10', 3),
(672, 27, '2020', '11', 6),
(673, 27, '2020', '12', 10),
(674, 27, '2021', '1', 2),
(675, 27, '2020', '2', 5),
(676, 27, '2021', '3', 4),
(677, 27, '2021', '4', 5),
(678, 27, '2020', '5', 7),
(679, 27, '2020', '6', 11),
(680, 27, '2021', '7', 4),
(681, 27, '2021', '8', 2),
(682, 27, '2021', '9', 3),
(683, 27, '2021', '10', 2),
(684, 27, '2021', '11', 5),
(685, 27, '2021', '12', 3),
(686, 27, '2022', '1', 5),
(687, 27, '2022', '2', 4),
(688, 27, '2022', '3', 1),
(689, 27, '2022', '4', 2),
(690, 27, '2022', '5', 5),
(691, 27, '2022', '6', 7),
(692, 27, '2022', '7', 2),
(693, 27, '2022', '8', 4),
(694, 27, '2022', '9', 6),
(695, 27, '2022', '10', 8),
(696, 27, '2022', '11', 2),
(697, 27, '2022', '12', 5),
(698, 28, '2020', '1', 4),
(699, 28, '2020', '2', 5),
(701, 28, '2020', '3', 9),
(702, 28, '2020', '4', 12),
(703, 28, '2020', '5', 4),
(704, 28, '2020', '6', 1),
(705, 28, '2020', '7', 1),
(706, 28, '2020', '8', 2),
(707, 28, '2020', '9', 9),
(708, 28, '2020', '10', 5),
(709, 28, '2020', '11', 2),
(710, 28, '2020', '12', 4),
(711, 28, '2021', '1', 4),
(712, 28, '2021', '2', 5),
(713, 28, '2021', '3', 1),
(714, 28, '2021', '4', 2),
(715, 28, '2021', '5', 6),
(716, 28, '2021', '6', 3),
(717, 28, '2021', '7', 8),
(718, 28, '2021', '8', 9),
(719, 28, '2021', '9', 12),
(720, 28, '2021', '10', 16),
(721, 28, '2021', '11', 11),
(722, 28, '2021', '12', 10),
(723, 28, '2022', '1', 4),
(724, 28, '2022', '2', 12),
(725, 28, '2022', '3', 6),
(726, 28, '2022', '4', 9),
(727, 28, '2022', '5', 11),
(728, 28, '2022', '6', 8),
(729, 28, '2022', '7', 6),
(730, 28, '2022', '8', 7),
(731, 28, '2022', '9', 13),
(733, 28, '2022', '10', 15),
(734, 28, '2022', '11', 17),
(735, 28, '2022', '12', 12),
(736, 29, '2020', '1', 7),
(737, 29, '2020', '2', 1),
(738, 29, '2020', '3', 8),
(739, 29, '2020', '4', 3),
(740, 29, '2020', '5', 1),
(741, 29, '2020', '6', 2),
(742, 29, '2020', '7', 2),
(743, 29, '2020', '8', 3),
(744, 29, '2020', '9', 5),
(745, 29, '2020', '11', 6),
(746, 29, '2020', '12', 10),
(747, 29, '2021', '1', 2),
(748, 29, '2021', '2', 5),
(749, 29, '2021', '3', 4),
(750, 29, '2021', '4', 5),
(751, 29, '2021', '5', 7),
(752, 29, '2021', '6', 11),
(753, 29, '2021', '7', 4),
(754, 29, '2021', '8', 2),
(755, 29, '2021', '9', 3),
(756, 29, '2021', '10', 2),
(757, 29, '2021', '11', 5),
(758, 29, '2021', '12', 3),
(759, 29, '2022', '1', 5),
(760, 29, '2022', '2', 4),
(761, 29, '2022', '3', 1),
(762, 29, '2022', '4', 2),
(763, 29, '2022', '5', 5),
(764, 29, '2022', '6', 7),
(765, 29, '2022', '7', 2),
(766, 29, '2022', '8', 4),
(767, 29, '2022', '9', 6),
(768, 29, '2022', '10', 8),
(769, 29, '2022', '11', 2),
(770, 29, '2022', '12', 5),
(771, 18, '2023', '1', 102),
(772, 18, '2023', '2', 100),
(773, 18, '2023', '3', 112),
(774, 18, '2023', '4', 135),
(775, 18, '2023', '5', 139),
(776, 18, '2023', '6', 103),
(777, 18, '2023', '7', 100),
(778, 19, '2023', '1', 106),
(779, 19, '2023', '2', 103),
(780, 19, '2023', '3', 101),
(781, 19, '2023', '4', 75),
(782, 19, '2020', '4', 75),
(783, 19, '2023', '5', 76),
(784, 19, '2023', '6', 66),
(785, 19, '2023', '7', 67),
(786, 20, '2023', '1', 92),
(787, 20, '2023', '2', 80),
(788, 20, '2023', '3', 92),
(789, 20, '2023', '4', 25),
(790, 20, '2023', '5', 80),
(791, 20, '2023', '6', 45),
(792, 20, '2023', '7', 50),
(793, 21, '2023', '1', 107),
(794, 21, '2023', '2', 112),
(795, 21, '2023', '3', 90),
(796, 21, '2023', '4', 225),
(797, 21, '2023', '5', 144),
(798, 21, '2023', '5', 144),
(799, 21, '2023', '6', 87),
(800, 21, '2023', '7', 90),
(801, 22, '2023', '1', 9),
(802, 22, '2023', '2', 12),
(803, 22, '2023', '3', 9),
(804, 22, '2023', '4', 32),
(805, 22, '2023', '5', 13),
(806, 22, '2023', '6', 23),
(807, 22, '2023', '7', 43),
(808, 23, '2023', '1', 11),
(809, 23, '2023', '2', 9),
(810, 23, '2023', '3', 4),
(811, 23, '2023', '4', 12),
(812, 23, '2023', '5', 23),
(813, 23, '2023', '6', 43),
(814, 23, '2023', '7', 54),
(815, 24, '2023', '1', 2),
(816, 24, '2023', '2', 1),
(817, 24, '2023', '3', 2),
(818, 24, '2023', '4', 5),
(819, 24, '2023', '5', 34),
(820, 24, '2023', '6', 54),
(821, 24, '2023', '7', 65),
(822, 25, '2023', '1', 16),
(823, 25, '2023', '2', 16),
(824, 25, '2023', '3', 16),
(825, 25, '2023', '5', 9),
(826, 25, '2023', '6', 57),
(827, 25, '2023', '7', 80),
(828, 26, '2023', '1', 7),
(829, 26, '2023', '2', 1),
(830, 26, '2023', '3', 4),
(831, 26, '2023', '4', 2),
(832, 26, '2023', '5', 6),
(833, 26, '2023', '6', 4),
(834, 26, '2023', '7', 5),
(835, 27, '2023', '1', 5),
(836, 27, '2023', '2', 1),
(837, 27, '2023', '3', 2),
(838, 27, '2023', '4', 5),
(839, 27, '2023', '5', 3),
(840, 27, '2023', '6', 7),
(841, 27, '2023', '7', 8),
(842, 28, '2023', '1', 9),
(843, 28, '2023', '2', 4),
(844, 28, '2023', '3', 1),
(845, 28, '2023', '4', 3),
(846, 28, '2023', '5', 1),
(847, 28, '2023', '6', 8),
(848, 28, '2023', '7', 10),
(849, 29, '2023', '1', 4),
(850, 29, '2023', '2', 5),
(851, 29, '2023', '3', 1),
(852, 29, '2023', '4', 2),
(853, 29, '2023', '5', 1),
(854, 29, '2023', '6', 7),
(855, 29, '2023', '7', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`) VALUES
(3, 'Nasruddin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  ADD PRIMARY KEY (`id_jenis`) USING BTREE;

--
-- Indeks untuk tabel `tbl_kasus`
--
ALTER TABLE `tbl_kasus`
  ADD PRIMARY KEY (`id_kasus`) USING BTREE;

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tbl_kasus`
--
ALTER TABLE `tbl_kasus`
  MODIFY `id_kasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=856;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
