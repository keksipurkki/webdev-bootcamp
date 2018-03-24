
     Week days:

     There are 7 week days. We want to represent them with minimum amount of
     information (in a database).

     We pick the alphabet [0,1], a bit.

     One bit encodes 2 week days                      |  ❌
     Two bits encode 2 * 2 = 4 week days              |  ❌
     Three bits encode 2 * 2 * 2 = 8 week days        |  ✓

     We can represent all week days with the following scheme:

     000  Monday
     001  Tuesday
     010  Wednesday
     011  Thursday
     100  Friday
     101  Saturday
     110  Sunday
     111  Unused

     Countries:

     There are 249 countries in the world.
     We pick the alphabet [A-Z] to represent them. The alphabet contains 26
     letters [A-Z].

     One capital letter encodes 26 countries          | ❌
     Two capital letters encode 26**2 = 676 entities  | ✓

     We can represent all countries with a two-character code.

     DNA:

     There are 21 proteinogenic amino acid (L-Alanine, L-Asparagine, ...L-Valine).
     DNA consists of 4 different nucleotides (T = Thymine, C = Cytosine, G =
     Guanine, A = Adenine) grouped into codes (codons) of length L.

     A DNA sequence of K codons encodes the information to synthesize a protein
     made of K amino acids.

     What is L given an alphabet of size 4?

     A code of length 1 encodes 4 amino acids                 | ❌
     A code of length 2 encodes 4 * 4 = 16 amino acids        | ❌
     A code of length 3 encodes 4 * 4 * 4 = 64 amino acids    | ✓

     The minimum message length is 3. Indeed, the DNA nucleotides are always
     processed triplets.
