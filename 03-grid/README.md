# Information theory and bits

### Week days

There are 7 week days. We want to represent them digitally with minimum
amount of information (e.g., in order to save space).

We pick the alphabet [0,1], a bit.

One bit encodes 2 week days                      |  x
Two bits encode 2 * 2 = 4 week days              |  x
Three bits encode 2 * 2 * 2 = 8 week days        |  ✓

We could represent all week days with the following scheme:

000  Monday
001  Tuesday
010  Wednesday
011  Thursday
100  Friday
101  Saturday
110  Sunday
111  Unused

The scheme would work but it suffers from a practical problem. Computers
are not good at reading data in chunks of 3 bits. A CPU has a default "word
size" that is the number of bits the processor reads at a time.  The
word size is always a power of two, 64-bit being the standard in current
mainstream CPUs.

Therefore, a more practical way to represent the 7 weekdays would be to
spend one byte (8 bits) per day and encode the data with the following
scheme

00000001  Monday
00000010  Tuesday
00000100  Wednesday
00001000  Thursday
00010000  Friday
00100000  Saturday
01000000  Sunday

This scheme is a compromise between minimizing the memory footprint and
maximising CPU performance. To process one week day from memory, a 64
bit word is read starting from the memory address pointing to the data
to a CPU register. The first 8 bits hold the desired piece of data and
the remaining 56 bits can be ignored.

The way in which the days are represented at the bit level is in theory
arbitrary. However, the "shifted scheme" shown above has some practical
advantages, since "dumb" bit level operations are easier for the CPU to
execute than arithmetic. As an example, the above scheme allows us to
represent information such as "Monday to Wednesday" easily just by
adding the different days together.

### Characters

The set of possible characters is open-ended. At the very least we want
to represent digits (10), lower and upper case latin characters (2 *
26). But we also need representation for whitespace, punctuation
and other non-alphabet characters (=, <, >, etc.).



There are

Countries:

There are 249 countries in the world.
We pick the alphabet [A-Z] to represent them. The alphabet contains 26
letters [A-Z].

One capital letter encodes 26 countries          | x
Two capital letters encode 26^2 = 676 entities   | ✓

We can represent all countries with a two-character code.

DNA:

There are 21 proteinogenic amino acid (L-Alanine, L-Asparagine, ...L-Valine).
DNA consists of 4 different nucleotides (T = Thymine, C = Cytosine, G =
Guanine, A = Adenine) grouped into codes (codons) of length L.

A DNA sequence of K codons encodes the information to synthesize a protein
made of K amino acids.

What is L given an alphabet of size 4?

A code of length 1 encodes 4 amino acids                 | x
A code of length 2 encodes 4 * 4 = 16 amino acids        | x
A code of length 3 encodes 4 * 4 * 4 = 64 amino acids    | ✓

The minimum message length is 3. Indeed, the DNA nucleotides are always
processed triplets.
