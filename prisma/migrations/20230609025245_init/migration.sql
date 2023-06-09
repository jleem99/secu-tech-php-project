-- CreateTable
CREATE TABLE `Student` (
    `studentId` VARCHAR(191) NOT NULL,
    `name` VARCHAR(191) NOT NULL,
    `ssn` VARCHAR(191) NOT NULL,
    `phone` VARCHAR(191) NOT NULL,
    `address` VARCHAR(191) NOT NULL,
    `collegeCode` VARCHAR(191) NOT NULL,
    `departmentCode` VARCHAR(191) NOT NULL,
    `studentType` ENUM('UNDERGRADUATE', 'GRADUATE') NOT NULL,
    `status` ENUM('ENROLLED', 'ON_LEAVE', 'GRADUATED', 'DROPPED_OUT') NOT NULL,

    PRIMARY KEY (`studentId`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `StudentStatusChange` (
    `studentId` VARCHAR(191) NOT NULL,
    `status` ENUM('ENROLLED', 'ON_LEAVE', 'GRADUATED', 'DROPPED_OUT') NOT NULL,
    `statusChangeCode` VARCHAR(191) NOT NULL,
    `startDate` DATETIME(3) NOT NULL,
    `endDate` DATETIME(3) NOT NULL,

    PRIMARY KEY (`studentId`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `Promotion` (
    `studentId` VARCHAR(191) NOT NULL,
    `year` INTEGER NOT NULL,
    `semester` INTEGER NOT NULL,
    `grade` INTEGER NOT NULL,

    PRIMARY KEY (`studentId`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `GraduationCandidate` (
    `studentId` VARCHAR(191) NOT NULL,
    `graduationYear` INTEGER NOT NULL,
    `graduationSemester` INTEGER NOT NULL,
    `graduationConfirmed` BOOLEAN NOT NULL,
    `degreeNumber` VARCHAR(191) NULL,
    `thesisTitle` VARCHAR(191) NULL,
    `graduationFailReasonCode` VARCHAR(191) NULL,

    PRIMARY KEY (`studentId`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `Registration` (
    `studentId` VARCHAR(191) NOT NULL,
    `registrationYear` INTEGER NOT NULL,
    `registrationSemester` INTEGER NOT NULL,
    `tuition` INTEGER NOT NULL,
    `paymentDate` DATETIME(3) NULL,

    PRIMARY KEY (`studentId`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- AddForeignKey
ALTER TABLE `StudentStatusChange` ADD CONSTRAINT `StudentStatusChange_studentId_fkey` FOREIGN KEY (`studentId`) REFERENCES `Student`(`studentId`) ON DELETE RESTRICT ON UPDATE CASCADE;

-- AddForeignKey
ALTER TABLE `Promotion` ADD CONSTRAINT `Promotion_studentId_fkey` FOREIGN KEY (`studentId`) REFERENCES `Student`(`studentId`) ON DELETE RESTRICT ON UPDATE CASCADE;

-- AddForeignKey
ALTER TABLE `GraduationCandidate` ADD CONSTRAINT `GraduationCandidate_studentId_fkey` FOREIGN KEY (`studentId`) REFERENCES `Student`(`studentId`) ON DELETE RESTRICT ON UPDATE CASCADE;

-- AddForeignKey
ALTER TABLE `Registration` ADD CONSTRAINT `Registration_studentId_fkey` FOREIGN KEY (`studentId`) REFERENCES `Student`(`studentId`) ON DELETE RESTRICT ON UPDATE CASCADE;
